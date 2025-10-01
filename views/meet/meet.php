<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$user_id = 1;
$user_name = "Angela";
$user_email = "angelanastovska23@gmail.com";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $answers = $_POST;

    $required_fields = [
        'full_name', 'animal_type', 'living_place', 'dob', 'occupation',
        'email', 'phone', 'living_situation', 'community_agree', 'children_info',
        'housing_type', 'ownership', 'landlord_permission', 'balcony_yard', 'fenced',
        'reason', 'responsible_person', 'pet_living_place', 'alone_hours', 'care_when_absent',
        'walk_frequency', 'had_pet', 'gave_up_pet', 'current_pet', 'understand_law',
        'additional_contact', 'visit_day', 'visit_time'
    ];

    $error = '';
    foreach($required_fields as $field) {
        if(!isset($answers[$field]) || trim($answers[$field]) === '') {
            $error = "Please answer all required questions before proceeding.";
            break;
        }
    }

    if(empty($error)) {

            // PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'petheart111@gmail.com';
                $mail->Password = 'ufcldlfnkbiqpnya';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('petheart111@gmail.com', 'New Home For Pet');
                $mail->addAddress($answers['email'], $answers['full_name']);
                $mail->isHTML(true);
                $mail->Subject = 'Confirmation of Adoption Request';

                $body = "<html><body>";
                $body .= "<h2>Thank you for your interest in adopting a pet</h2>";
                $body .= "<p>Dear {$answers['full_name']},</p>";
                $body .= "<p>We are pleased to confirm your adoption request for <strong>{$answers['animal_type']}</strong>. Below are the details you submitted:</p>";
                
                $body .= "<h3>Visit Information:</h3>";
                $body .= "<p>Please visit us on <strong>{$answers['visit_day']}</strong> at <strong>{$answers['visit_time']}</strong> to meet your future pet.</p>";
                
                $body .= "<p>If you have any questions, contact us at:</p>";
                $body .= "<p>Email: petheart111@gmail.com<br>Phone: +389 75 575 775<br>Address: Your Shelter Address</p>";
                $body .= "<p>Best regards,<br><strong>New Home For Pet Team</strong></p>";
                $body .= "</body></html>";

                $mail->Body = $body;
                $mail->send();

                $success = "Your adoption request has been submitted successfully! A confirmation email has been sent to {$answers['email']}.";
header("Location: " . BASE_URL . "/home/index");
exit;


            } catch(Exception $e) {
                $error = "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Application Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4CAF50;
            --primary-dark: #45a049;
            --secondary-color: #6c757d;
            --secondary-dark: #5a6268;
            --accent-color: #667eea;
            --light-bg: #f8f9fa;
            --border-color: #e0e0e0;
            --error-color: #dc3545;
            --success-color: #28a745;
            --text-color: #333;
            --text-light: #6c757d;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .header p {
            opacity: 0.9;
        }
        
        .form-container {
            padding: 30px;
        }
        
        .progress-container {
            margin-bottom: 30px;
        }
        
        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
            counter-reset: step;
        }
        
        .progress-steps::before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            width: 100%;
            height: 4px;
            background-color: var(--border-color);
            z-index: 1;
        }
        
        .progress-bar {
            position: absolute;
            top: 15px;
            left: 0;
            height: 4px;
            background-color: var(--primary-color);
            z-index: 2;
            transition: width 0.5s ease;
        }
        
        .step {
            position: relative;
            z-index: 3;
            text-align: center;
            width: 36px;
            height: 36px;
            background-color: var(--border-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .step.active {
            background-color: var(--primary-color);
        }
        
        .step-label {
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 12px;
            color: var(--text-light);
        }
        
        .step.active .step-label {
            color: var(--primary-color);
            font-weight: 600;
        }
        
        fieldset {
            display: none;
            border: none;
            padding: 0;
            animation: fadeIn 0.5s ease;
        }
        
        fieldset.active {
            display: block;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fieldset-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }
        
        .fieldset-header h3 {
            font-size: 22px;
            color: var(--primary-color);
            display: flex;
            align-items: center;
        }
        
        .fieldset-header h3 i {
            margin-right: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #444;
        }
        
        .required::after {
            content: '*';
            color: var(--error-color);
            margin-left: 4px;
        }
        
        .input-icon {
            position: relative;
        }
        
        .input-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        
        .input-icon input,
        .input-icon select,
        .input-icon textarea {
            padding-left: 40px;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }
        
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        button {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        button i {
            margin: 0 5px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: var(--secondary-dark);
        }
        
        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            color: white;
        }
        
        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .notification {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .notification i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .error {
            background-color: #ffebee;
            color: var(--error-color);
            border-left: 4px solid var(--error-color);
        }
        
        .success {
            background-color: #e8f5e9;
            color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }
        
        @media (max-width: 768px) {
            .container {
                border-radius: 0;
            }
            
            .form-container {
                padding: 20px;
            }
            
            .step-label {
                display: none;
            }
            
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
            
            button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-paw"></i> Pet Adoption Application</h1>
            <p>Help us find the perfect home for our animals</p>
        </div>
        
        <div class="form-container">
            <?php if(!empty($error)): ?>
                <div class="notification error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if(!empty($success)): ?>
                <div class="notification success">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <div class="progress-container">
                <div class="progress-steps">
                    <div class="progress-bar" id="progress-bar" style="width: 20%;"></div>
                    <div class="step active" id="step-1">
                        1
                        <span class="step-label">Personal</span>
                    </div>
                    <div class="step" id="step-2">
                        2
                        <span class="step-label">Contact</span>
                    </div>
                    <div class="step" id="step-3">
                        3
                        <span class="step-label">Housing</span>
                    </div>
                    <div class="step" id="step-4">
                        4
                        <span class="step-label">Care</span>
                    </div>
                    <div class="step" id="step-5">
                        5
                        <span class="step-label">Final</span>
                    </div>
                </div>
            </div>
            
            <form method="POST" id="adoptionForm">
                <input type="hidden" name="animal_id" value="0">
                
                <fieldset class="active" id="fieldset-1">
                    <div class="fieldset-header">
                        <h3><i class="fas fa-user"></i> Personal Information</h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Full Name</label>
                        <div class="input-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" name="full_name" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Interested in (Animal Name)</label>
                        <div class="input-icon">
                            <i class="fas fa-paw"></i>
                            <input type="text" name="animal_type" placeholder="e.g. Dog, Cat, Rabbit" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Address</label>
                        <div class="input-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <input type="text" name="living_place" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Date of Birth</label>
                        <div class="input-icon">
                            <i class="fas fa-calendar"></i>
                            <input type="date" name="dob" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Occupation / Status</label>
                        <select name="occupation" required>
                            <option value="">--Select--</option>
                            <option value="Student">Student</option>
                            <option value="Employed">Employed</option>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Retired">Retired</option>
                            <option value="Self-employed">Self-employed</option>
                        </select>
                    </div>
                    
                    <div class="button-group">
                        <div></div> 
                        <button type="button" class="btn-primary next" data-next="2">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </fieldset>

                <fieldset id="fieldset-2">
                    <div class="fieldset-header">
                        <h3><i class="fas fa-address-book"></i> Contact & Family Information</h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Email</label>
                        <div class="input-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Phone</label>
                        <div class="input-icon">
                            <i class="fas fa-phone"></i>
                            <input type="text" name="phone" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you live alone or in a community?</label>
                        <select name="living_situation" required>
                            <option value="">--Select--</option>
                            <option value="Alone">Alone</option>
                            <option value="Community">Community</option>
                            <option value="Family">Family</option>
                            <option value="Roommates">Roommates</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">If community, are all adults agree to adopt?</label>
                        <select name="community_agree" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="N/A - Live alone">N/A - Live alone</option>
                            <option value="Don't know">Don't know</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Are there children in your household? (If yes, specify number and ages)</label>
                        <textarea name="children_info" placeholder="e.g. No children, or: 2 children - ages 8 and 12" required></textarea>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="btn-secondary prev" data-prev="1">
                            <i class="fas fa-arrow-left"></i> Previous
                        </button>
                        <button type="button" class="btn-primary next" data-next="3">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </fieldset>

                <fieldset id="fieldset-3">
                    <div class="fieldset-header">
                        <h3><i class="fas fa-home"></i> Housing Information</h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you live in an apartment or house?</label>
                        <select name="housing_type" required>
                            <option value="">--Select--</option>
                            <option value="Apartment">Apartment</option>
                            <option value="House">House</option>
                            <option value="Condo">Condo</option>
                            <option value="Mobile Home">Mobile Home</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you own or rent?</label>
                        <select name="ownership" required>
                            <option value="">--Select--</option>
                            <option value="Own">Own</option>
                            <option value="Rent">Rent</option>
                            <option value="Living with family">Living with family</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">If renting, does the landlord allow pets?</label>
                        <select name="landlord_permission" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="N/A - I own">N/A - I own</option>
                            <option value="Need to check">Need to check</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you have balcony or yard?</label>
                        <select name="balcony_yard" required>
                            <option value="">--Select--</option>
                            <option value="Balcony">Balcony</option>
                            <option value="Yard">Yard</option>
                            <option value="Both">Both</option>
                            <option value="None">None</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Is balcony/yard fenced properly?</label>
                        <select name="fenced" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="Partially">Partially</option>
                            <option value="N/A - No outdoor space">N/A - No outdoor space</option>
                        </select>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="btn-secondary prev" data-prev="2">
                            <i class="fas fa-arrow-left"></i> Previous
                        </button>
                        <button type="button" class="btn-primary next" data-next="4">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </fieldset>

                <fieldset id="fieldset-4">
                    <div class="fieldset-header">
                        <h3><i class="fas fa-heart"></i> Pet Care & Responsibility</h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Why do you want to adopt this pet?</label>
                        <textarea name="reason" placeholder="Please explain your motivation for adopting this pet" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Who will be responsible for the pet? (feeding, walks, training, vet, socialization)</label>
                        <textarea name="responsible_person" placeholder="Describe who will take care of daily needs" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Where will the pet sleep/live?</label>
                        <textarea name="pet_living_place" placeholder="Describe where the pet will spend most of its time" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">How many hours per day the pet will be alone and where?</label>
                        <textarea name="alone_hours" placeholder="e.g. 4-6 hours, in the living room" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Who will care for the pet during your absence/vacation?</label>
                        <textarea name="care_when_absent" placeholder="Your plan for pet care when you're away" required></textarea>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="btn-secondary prev" data-prev="3">
                            <i class="fas fa-arrow-left"></i> Previous
                        </button>
                        <button type="button" class="btn-primary next" data-next="5">
                            Next <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </fieldset>

                <fieldset id="fieldset-5">
                    <div class="fieldset-header">
                        <h3><i class="fas fa-clipboard-check"></i> Experience & Final Details</h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">How often will you walk the pet?</label>
                        <textarea name="walk_frequency" placeholder="e.g. 2 times daily, morning and evening" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Have you ever had a pet before?</label>
                        <select name="had_pet" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Have you ever given up a pet?</label>
                        <select name="gave_up_pet" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you currently own a pet? (If yes, specify type, age, gender)</label>
                        <textarea name="current_pet" placeholder="e.g. No current pets, or: Dog, 3 years old, female" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Do you understand your obligations as a pet owner according to law?</label>
                        <select name="understand_law" required>
                            <option value="">--Select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Additional contact person (name & phone)</label>
                        <textarea name="additional_contact" placeholder="Emergency contact: Name and phone number" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Additional comments</label>
                        <textarea name="comments" placeholder="Any additional information you'd like to share"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Preferred day to visit (Mon-Fri)</label>
                        <select name="visit_day" required>
                            <option value="">--Select--</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="required">Preferred time (08:00-16:00)</label>
                        <div class="input-icon">
                            <i class="fas fa-clock"></i>
                            <input type="time" name="visit_time" min="08:00" max="16:00" required>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" class="btn-secondary prev" data-prev="4">
                            <i class="fas fa-arrow-left"></i> Previous
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane"></i> Submit Application
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nextButtons = document.querySelectorAll('.next');
            const prevButtons = document.querySelectorAll('.prev');
            const fieldsets = document.querySelectorAll('fieldset');
            const steps = document.querySelectorAll('.step');
            const progressBar = document.getElementById('progress-bar');
            let currentStep = 1;
            
            function updateProgress() {
                const percentage = ((currentStep - 1) / (fieldsets.length - 1)) * 100;
                progressBar.style.width = percentage + '%';
                
                steps.forEach((step, index) => {
                    if (index + 1 <= currentStep) {
                        step.classList.add('active');
                    } else {
                        step.classList.remove('active');
                    }
                });
            }
            
            function validateStep(step) {
                const currentFieldset = document.getElementById(`fieldset-${step}`);
                const requiredInputs = currentFieldset.querySelectorAll('[required]');
                let isValid = true;
                
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.style.borderColor = 'var(--error-color)';
                        
                        input.addEventListener('input', function() {
                            if (this.value.trim()) {
                                this.style.borderColor = '';
                            }
                        });
                    }
                });
                
                return isValid;
            }
            
            function goToStep(step) {
                fieldsets.forEach(fieldset => fieldset.classList.remove('active'));
                document.getElementById(`fieldset-${step}`).classList.add('active');
                currentStep = step;
                updateProgress();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
            
            nextButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));
                    
                    if (validateStep(currentStep)) {
                        goToStep(nextStep);
                    } else {
                        alert('Please fill all required fields before proceeding.');
                    }
                });
            });
            
            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    goToStep(prevStep);
                });
            });
            
            document.getElementById('adoptionForm').addEventListener('submit', function(e) {
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                    alert('Please fill all required fields before submitting.');
                    return;
                }
                
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                submitBtn.disabled = true;
                

                
            });
            updateProgress();
        });
    </script>
</body>
</html>