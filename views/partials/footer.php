    <footer>
        <div class="footer-content">
            <div class="social-icons">
                <a href="https://www.facebook.com/yourpagename" target="_blank" aria-label="Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" 
                         alt="Facebook" 
                         style="width:32px; height:32px;">
                </a>
                <a href="https://www.instagram.com/yourprofilename" target="_blank" aria-label="Instagram">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" 
                         alt="Instagram" 
                         style="width:32px; height:32px;">
                </a>

                <a href="https://www.twitter.com/yourprofilename" target="_blank" aria-label="Twitter">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" 
                        alt="Twitter" 
                        style="width:32px; height:32px;">
                </a>

                <a href="https://www.youtube.com/yourchannelname" target="_blank" aria-label="YouTube">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b8/YouTube_Logo_2017.svg" 
                         alt="YouTube" 
                         style="width:38px; height:38px;">
                </a>

                <a href="https://www.linkedin.com/in/yourprofilename" target="_blank" aria-label="LinkedIn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" 
                         alt="LinkedIn" 
                         style="width:32px; height:32px;">
                </a>
            
            </div>

            <p class="copyright">© 2025 PET HEART. All rights reserved.</p>
        </div>
    </footer>

    <script src="<?php echo JS_PATH; ?>script.js"></script>

    <?php if (strpos($_SERVER['REQUEST_URI'], 'about') !== false): ?>
    <script src="<?php echo JS_PATH; ?>about.js"></script>
    <?php endif; ?>
    
    <script>
        const BASE_URL = '<?php echo BASE_URL; ?>';
    </script>
</body>
</html>