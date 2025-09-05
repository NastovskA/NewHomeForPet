<!DOCTYPE html>
<html lang="mk">
<head>
  <meta charset="UTF-8">
  <title>🌍 Мапа на животни по градови</title>
  <script src="https://d3js.org/d3.v7.min.js"></script>
  <script src="https://unpkg.com/topojson@3"></script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fafafa;
    }

    #world-map {
      width: 100%;
      height: 90vh;
      position: relative;
      z-index: 1;
    }

    svg {
      width: 100%;
      height: 100%;
      position: relative;
    }

    .tooltip {
      position: absolute;
      background: rgba(221, 199, 238, 0.95);
      padding: 8px;
      font-size: 13px;
      pointer-events: none;
      opacity: 0;
      display: none;
      border-radius: 4px;
      box-shadow: 0 0 5px rgba(0,0,0,0.2);
      z-index: 10;
    }

    #legend-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
      padding: 12px;
      background: white;
      border-top: 1px solid #ebcdefff;
      font-size: 14px;
    }

    .legend-item {
      display: flex;
      align-items: center;
    }

    .legend-color {
      width: 16px;
      height: 16px;
      margin-right: 6px;
      border: 1px solid #333;
      border-radius: 50%;
    }
  </style>
</head>
<body>
  <div id="world-map"></div>
  <div class="tooltip" id="tooltip"></div>
  <div id="legend-bar"></div>

  <script>
    const width = window.innerWidth;
    const height = window.innerHeight * 0.9;

    const svg = d3.select("#world-map")
                  .append("svg")
                  .attr("width", width)
                  .attr("height", height);

    // 🎨 Градиент позадина
    const defs = svg.append("defs");

    const gradient = defs.append("linearGradient")
      .attr("id", "bg-gradient")
      .attr("x1", "0%")
      .attr("y1", "0%")
      .attr("x2", "100%")
      .attr("y2", "0%");

    gradient.append("stop")
      .attr("offset", "0%")
      .attr("stop-color", "#f0e9f2ff");

    gradient.append("stop")
      .attr("offset", "100%")
      .attr("stop-color", "#e0c5ebff");

    svg.append("rect")
      .attr("width", width)
      .attr("height", height)
      .attr("fill", "url(#bg-gradient)");

    // ✂️ Clipping за да се отсече долниот дел
    const clip = defs.append("clipPath")
      .attr("id", "map-clip");

    clip.append("rect")
      .attr("x", 0)
      .attr("y", 0)
      .attr("width", width)
      .attr("height", height * 0.92); // отсечи долниот 8%

    // 🌍 Проекција со подобра центрираност
    const projection = d3.geoNaturalEarth1()
                         .scale(width / 6.8)
                         .translate([width / 2, height / 2.2]);

    const path = d3.geoPath().projection(projection);
    const mapLayer = svg.append("g")
                        .attr("class", "map-layer")
                        .attr("clip-path", "url(#map-clip)");

    const pointsLayer = svg.append("g")
                           .attr("class", "points-layer")
                           .attr("clip-path", "url(#map-clip)");

    const tooltip = d3.select("#tooltip");

    const colorScale = d3.scaleOrdinal()
      .domain(["cats", "dogs", "parrots", "hamsters", "rabbits", "chinchillas"])
      .range(["#4ECDC4", "#FF6B6B", "#FFD93D", "#6A4C93", "#FFA500", "#28eb1dff"]);

    // 🌍 Вчитување на мапа
    d3.json("https://cdn.jsdelivr.net/npm/world-atlas@2/countries-110m.json").then(worldData => {
      const countries = topojson.feature(worldData, worldData.objects.countries).features;

      mapLayer.selectAll("path")
        .data(countries)
        .enter()
        .append("path")
        .attr("d", path)
        .attr("fill", "#ffffffff")
        .attr("stroke", "#282626ff");

      // 🐾 Вчитување животни
      fetch("views/pets_data.php")
        .then(response => response.json())
        .then(animalData => {
          pointsLayer.selectAll("circle")
            .data(animalData)
            .enter()
            .append("circle")
            .attr("cx", d => projection([d.lon, d.lat])[0])
            .attr("cy", d => projection([d.lon, d.lat])[1])
            .attr("r", 5)
            .attr("fill", d => colorScale(d.type))
            .attr("stroke", "#1d1d1dff")
            .attr("stroke-width", 0.5)
            .on("mouseover", (event, d) => {
              tooltip.style("opacity", 1)
                     .style("display", "block")
                     .style("left", (event.pageX + 10) + "px")
                     .style("top", (event.pageY - 20) + "px")
                     .html(`<strong>${d.type}</strong><br>${d.city}, ${d.country}`);
            })
            .on("mouseout", () => {
              tooltip.style("opacity", 0)
                     .style("display", "none");
            });

          // 🎨 Легенда
          const legendContainer = d3.select("#legend-bar");
          colorScale.domain().forEach(type => {
            const item = legendContainer.append("div").attr("class", "legend-item");
            item.append("div")
                .attr("class", "legend-color")
                .style("background-color", colorScale(type));
            item.append("div").text(type.charAt(0).toUpperCase() + type.slice(1));
          });
        })
        .catch(error => {
          console.error("Грешка при вчитување на животни:", error);
        });
    });
  </script>
</body>
</html>
