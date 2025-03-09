// Three.js Digital Earth Animation
document.addEventListener('DOMContentLoaded', function () {
  // Initialize the globe animation
  function initGlobe() {
    // Create the scene
    const scene = new THREE.Scene();

    // Get the container dimensions
    const container = document.getElementById('globe-container');
    if (!container) return;

    const width = container.clientWidth;
    const height = container.clientHeight;

    // Create the camera
    const camera = new THREE.PerspectiveCamera(
      75,
      width / height,
      0.1,
      1000
    );
    // Set a fixed camera position
    camera.position.z = 7;
    camera.position.y = 0;
    camera.position.x = 0;

    // Create the renderer
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(width, height);
    renderer.setClearColor(0x000000, 0); // Transparent background

    // Clear container and append renderer
    container.innerHTML = '';
    container.appendChild(renderer.domElement);

    // Center the scene in the container
    renderer.domElement.style.position = 'absolute';
    renderer.domElement.style.left = '50%';
    renderer.domElement.style.top = '50%';
    renderer.domElement.style.transform = 'translate(-50%, -50%)';

    // Create a wireframe sphere geometry for the Earth
    const geometry = new THREE.SphereGeometry(2, 32, 32);
    const wireframe = new THREE.WireframeGeometry(geometry);
    const material = new THREE.LineBasicMaterial({
      color: 0x01b380,
      transparent: true,
      opacity: 0.6
    });
    const globe = new THREE.LineSegments(wireframe, material);
    scene.add(globe);

    // Add a glowing halo
    const haloGeometry = new THREE.SphereGeometry(2.1, 32, 32);
    const haloMaterial = new THREE.MeshBasicMaterial({
      color: 0x01b380,
      transparent: true,
      opacity: 0.2
    });
    const halo = new THREE.Mesh(haloGeometry, haloMaterial);
    scene.add(halo);

    // Add point particles around the globe for a subtle effect
    const particlesGeometry = new THREE.BufferGeometry();
    const particlesCount = 200;
    const posArray = new Float32Array(particlesCount * 3);

    for (let i = 0; i < particlesCount; i++) {
      // Create particles in a sphere shape
      const angle1 = Math.random() * Math.PI * 2;
      const angle2 = Math.random() * Math.PI;
      const radius = 2 + (Math.random() * 0.5);

      posArray[i * 3] = Math.sin(angle2) * Math.cos(angle1) * radius; // x
      posArray[i * 3 + 1] = Math.sin(angle2) * Math.sin(angle1) * radius; // y
      posArray[i * 3 + 2] = Math.cos(angle2) * radius; // z
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    const particlesMaterial = new THREE.PointsMaterial({
      size: 0.05,
      color: 0x01b380,
      transparent: true,
      opacity: 0.8
    });

    const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
    scene.add(particlesMesh);

    // Create orbital network rings similar to FINSEC SVG animation
    const createNetworkRing = (radius, nodesCount, thickness) => {
      // Create the ring group
      const ringGroup = new THREE.Group();

      // Create the main ring (thinner and more elegant)
      const ringGeometry = new THREE.RingGeometry(radius - thickness / 2, radius + thickness / 2, 64);
      const ringMaterial = new THREE.MeshBasicMaterial({
        color: 0x01b380,
        transparent: true,
        opacity: 0.3,
        side: THREE.DoubleSide
      });
      const ring = new THREE.Mesh(ringGeometry, ringMaterial);
      ring.rotation.x = Math.PI / 2; // Lay flat
      ringGroup.add(ring);

      // Create nodes along the ring
      const nodes = [];
      for (let i = 0; i < nodesCount; i++) {
        const angle = (i / nodesCount) * Math.PI * 2;
        const nodeGeometry = new THREE.SphereGeometry(thickness * 2, 8, 8);
        const nodeMaterial = new THREE.MeshBasicMaterial({
          color: 0x01b380,
          transparent: true,
          opacity: 0.8
        });
        const node = new THREE.Mesh(nodeGeometry, nodeMaterial);

        // Position node on the ring
        node.position.x = Math.cos(angle) * radius;
        node.position.y = Math.sin(angle) * radius;
        node.position.z = 0;

        ringGroup.add(node);
        nodes.push(node);
      }

      // Create connections between nodes (network effect)
      for (let i = 0; i < nodes.length; i++) {
        // Connect to several nearby nodes, not all
        const connectionsCount = Math.min(3, Math.floor(nodesCount / 4)); // Connect to ~25% of nearby nodes

        for (let j = 1; j <= connectionsCount; j++) {
          const targetIdx = (i + j) % nodes.length;
          const lineGeometry = new THREE.BufferGeometry().setFromPoints([
            nodes[i].position,
            nodes[targetIdx].position
          ]);

          const lineMaterial = new THREE.LineBasicMaterial({
            color: 0x01b380,
            transparent: true,
            opacity: 0.3
          });

          const line = new THREE.Line(lineGeometry, lineMaterial);
          ringGroup.add(line);
        }
      }

      // Add animation data
      ringGroup.userData = {
        rotationSpeed: (Math.random() * 0.001) + 0.0005,
        direction: Math.random() > 0.5 ? 1 : -1,
        nodes: nodes
      };

      return ringGroup;
    };

    // Create network rings
    const networkRings = [];
    const ringCount = 3;

    for (let i = 0; i < ringCount; i++) {
      const radius = 3 + (i * 0.7); // Increasing radius for each ring
      const nodesCount = 8 + (i * 4); // More nodes for outer rings
      const thickness = 0.02;

      const networkRing = createNetworkRing(radius, nodesCount, thickness);
      scene.add(networkRing);
      networkRings.push(networkRing);
    }

    // Add white text labels that orbit around the globe
    const createFloatingLabels = () => {
      // List of cybersecurity topics
      const topics = [
        'Cyber Security', 'Zero Trust', 'Data Privacy',
        'Digital Innovation', 'IoT Security', 'DevSecOps',
        'Threat Intelligence', 'GDPR', 'Risk Management',
        'Privacy Protection', 'Compliance', 'Ransomware',
        'AI Security', 'Blockchain', 'Quantum Computing',
        'Cloud Security', 'Identity Management', 'Security Automation'
      ];

      // Create a group for labels
      const labelsGroup = new THREE.Group();
      scene.add(labelsGroup);

      // Create and position labels around the Earth
      topics.forEach((topic, index) => {
        // Create text sprite for each topic
        const createTextSprite = (text) => {
          const canvas = document.createElement('canvas');
          canvas.width = 400; // Increased from 256 for more resolution
          canvas.height = 100; // Increased from 64 for more vertical space
          const ctx = canvas.getContext('2d');

          // Clear canvas with full transparency
          ctx.clearRect(0, 0, canvas.width, canvas.height);

          // Add pronounced glow effect for better visibility without background
          ctx.shadowColor = 'rgba(1, 179, 128, 0.9)';
          ctx.shadowBlur = 15;

          // Draw text with larger font
          ctx.font = 'bold 32px Arial';
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          ctx.fillStyle = 'white';

          // Handle potentially longer text by checking length
          if (text.length > 12) {
            // Split long text into words
            const words = text.split(' ');
            if (words.length > 1) {
              // Place words on multiple lines if needed
              const line1 = words.slice(0, Math.ceil(words.length / 2)).join(' ');
              const line2 = words.slice(Math.ceil(words.length / 2)).join(' ');
              ctx.fillText(line1, canvas.width / 2, canvas.height / 2 - 16);
              ctx.fillText(line2, canvas.width / 2, canvas.height / 2 + 16);
            } else {
              // Single long word
              ctx.fillText(text, canvas.width / 2, canvas.height / 2);
            }
          } else {
            // Standard text
            ctx.fillText(text, canvas.width / 2, canvas.height / 2);
          }

          // Create texture and sprite
          const texture = new THREE.CanvasTexture(canvas);
          const material = new THREE.SpriteMaterial({
            map: texture,
            transparent: true,
            opacity: 0.9
          });

          const sprite = new THREE.Sprite(material);
          // Adjust scale to accommodate larger text while maintaining aspect ratio
          sprite.scale.set(2.0, 0.5, 1);

          return sprite;
        };

        // Create sprite for this topic
        const sprite = createTextSprite(topic);

        // Calculate spherical distribution positions
        const phi = Math.acos(-1 + (2 * index) / topics.length);
        const theta = Math.sqrt(topics.length * Math.PI) * phi;

        // Start positions - inside the globe
        const innerRadius = 1.0; // Inside the globe (radius 2.0)

        // Target positions - outside the globe
        const outerRadius = 4.0 + Math.random() * 1.5;

        // Set initial position (inside the globe)
        sprite.position.x = innerRadius * Math.sin(phi) * Math.cos(theta);
        sprite.position.y = innerRadius * Math.sin(phi) * Math.sin(theta);
        sprite.position.z = innerRadius * Math.cos(phi);

        // Store animation parameters
        sprite.userData = {
          // Original inner position (starting point)
          innerPosition: sprite.position.clone(),

          // Target outer position (destination)
          outerPosition: new THREE.Vector3(
            outerRadius * Math.sin(phi) * Math.cos(theta),
            outerRadius * Math.sin(phi) * Math.sin(theta),
            outerRadius * Math.cos(phi)
          ),

          // Animation parameters
          speed: 0.002 + Math.random() * 0.002,
          animationState: 'emerging', // 'emerging', 'floating', 'returning'
          animationProgress: 0,
          animationDirection: 1,
          emergeDuration: 3 + Math.random() * 2, // Seconds to emerge
          floatDuration: 4 + Math.random() * 3,  // Seconds to float
          returnDuration: 2 + Math.random() * 2, // Seconds to return
          delayBeforeStart: Math.random() * 5,   // Random delay before starting
          elapsedTime: 0,                        // Track elapsed time

          // Animation variations
          floatAmplitude: 0.1 + Math.random() * 0.2,
          offsetX: Math.random() * 0.2 - 0.1,
          offsetZ: Math.random() * 0.2 - 0.1,

          // Always make sprite face the camera
          faceCamera: true
        };

        // Initially set low opacity
        sprite.material.opacity = 0.1;

        labelsGroup.add(sprite);
      });

      return labelsGroup;
    };

    // Create and add text labels
    const floatingLabels = createFloatingLabels();

    // Create connection lines between Earth and labels
    const createConnectionLines = () => {
      const linesGroup = new THREE.Group();
      scene.add(linesGroup);

      // For each label, create a line connecting to the Earth
      floatingLabels.children.forEach((label) => {
        // Create line geometry from Earth to label
        const earthRadius = 2;
        const earthPosition = new THREE.Vector3(0, 0, 0);

        // Calculate direction vector from Earth to label
        const direction = new THREE.Vector3().subVectors(label.position, earthPosition).normalize();

        // Start position - slightly outside Earth's surface
        const startPosition = direction.clone().multiplyScalar(earthRadius * 1.05);

        // Create line geometry
        const geometry = new THREE.BufferGeometry();
        const points = [];

        // Create curved path points
        const segments = 10;
        for (let i = 0; i <= segments; i++) {
          const t = i / segments;

          // Create a curved path with some elevation
          const x = startPosition.x + (label.position.x - startPosition.x) * t;
          const y = startPosition.y + (label.position.y - startPosition.y) * t;
          const z = startPosition.z + (label.position.z - startPosition.z) * t;

          points.push(new THREE.Vector3(x, y, z));
        }

        // Set positions
        geometry.setFromPoints(points);

        // Create line material with slight glow
        const material = new THREE.LineBasicMaterial({
          color: 0x01b380,
          transparent: true,
          opacity: 0.3
        });

        // Create the line
        const line = new THREE.Line(geometry, material);

        // Store reference to connected label
        line.userData = {
          connectedLabel: label,
          originalOpacity: material.opacity,
          pulseSpeed: 0.5 + Math.random() * 0.5,
          pulseAmplitude: 0.2
        };

        linesGroup.add(line);
      });

      return linesGroup;
    };

    const connectionLines = createConnectionLines();

    // Add mouse interaction for rotation
    let isDragging = false;
    let previousMousePosition = {
      x: 0,
      y: 0
    };

    container.addEventListener('mousedown', (e) => {
      isDragging = true;
    });

    document.addEventListener('mousemove', (e) => {
      if (isDragging) {
        const deltaMove = {
          x: e.clientX - previousMousePosition.x,
          y: e.clientY - previousMousePosition.y
        };

        globe.rotation.y += deltaMove.x * 0.01;
        globe.rotation.x += deltaMove.y * 0.01;

        halo.rotation.y = globe.rotation.y;
        halo.rotation.x = globe.rotation.x;

        particlesMesh.rotation.y = globe.rotation.y;
        particlesMesh.rotation.x = globe.rotation.x;

        // Rotate network rings with mouse movement
        networkRings.forEach(ring => {
          ring.rotation.z += deltaMove.x * 0.005;
        });
      }

      previousMousePosition = {
        x: e.clientX,
        y: e.clientY
      };
    });

    document.addEventListener('mouseup', (e) => {
      isDragging = false;
    });

    // Animation loop
    function animate() {
      requestAnimationFrame(animate);

      // Auto-rotate when not dragging
      if (!isDragging) {
        globe.rotation.y += 0.003; // Rotate the globe
        halo.rotation.y = globe.rotation.y;
        particlesMesh.rotation.y = globe.rotation.y;

        // Animate network rings
        networkRings.forEach(ring => {
          ring.rotation.z += ring.userData.rotationSpeed * ring.userData.direction;

          // Pulse the nodes
          const time = Date.now() * 0.001;
          ring.userData.nodes.forEach((node, index) => {
            const pulseSpeed = 0.5 + (index * 0.05);
            const pulse = Math.sin(time * pulseSpeed);
            node.scale.set(
              1 + pulse * 0.2,
              1 + pulse * 0.2,
              1 + pulse * 0.2
            );

            // Also pulse opacity
            node.material.opacity = 0.5 + (pulse + 1) * 0.25;
          });
        });

        // Animate floating labels
        if (floatingLabels) {
          floatingLabels.children.forEach(label => {
            const userData = label.userData;
            const time = Date.now() * 0.001;

            // Update elapsed time
            userData.elapsedTime += 0.016; // Approximate delta time

            // Wait for delay before starting animation
            if (userData.elapsedTime < userData.delayBeforeStart) {
              return;
            }

            // Handle different animation states
            if (userData.animationState === 'emerging') {
              // Emerging from globe to outer position
              userData.animationProgress += 0.016 / userData.emergeDuration;

              if (userData.animationProgress >= 1) {
                userData.animationProgress = 1;
                userData.animationState = 'floating';
                userData.elapsedTime = 0; // Reset for floating duration
              }

              // Interpolate position from inner to outer
              label.position.lerpVectors(
                userData.innerPosition,
                userData.outerPosition,
                easeOutCubic(userData.animationProgress)
              );

              // Fade in
              label.material.opacity = 0.1 + userData.animationProgress * 0.8;

            } else if (userData.animationState === 'floating') {
              // Floating at outer position with subtle motion
              const floatTime = time + userData.elapsedTime;

              // Base position is the outer position
              label.position.copy(userData.outerPosition);

              // Add subtle floating motion
              const yOffset = Math.sin(floatTime * userData.speed) * userData.floatAmplitude;
              const xOffset = Math.cos(floatTime * userData.speed * 0.7) * userData.offsetX;
              const zOffset = Math.sin(floatTime * userData.speed * 0.3) * userData.offsetZ;

              label.position.x += xOffset;
              label.position.y += yOffset;
              label.position.z += zOffset;

              // Check if floating time is complete
              if (userData.elapsedTime > userData.floatDuration) {
                userData.animationState = 'returning';
                userData.animationProgress = 0;
                userData.elapsedTime = 0; // Reset for return duration
              }

            } else if (userData.animationState === 'returning') {
              // Returning from outer position to inner
              userData.animationProgress += 0.016 / userData.returnDuration;

              if (userData.animationProgress >= 1) {
                userData.animationProgress = 1;
                userData.animationState = 'emerging';
                userData.animationProgress = 0;
                userData.elapsedTime = 0; // Reset with delay
                userData.delayBeforeStart = Math.random() * 2; // Shorter delay before re-emerging
              }

              // Interpolate position from outer to inner
              label.position.lerpVectors(
                userData.outerPosition,
                userData.innerPosition,
                easeInCubic(userData.animationProgress)
              );

              // Fade out
              label.material.opacity = 0.9 - userData.animationProgress * 0.8;
            }

            // Always face camera
            if (userData.faceCamera) {
              label.lookAt(camera.position);
            }
          });
        }

        // Animate connection lines
        if (connectionLines) {
          const time = Date.now() * 0.001;

          connectionLines.children.forEach(line => {
            const userData = line.userData;

            // Update line geometry to match label position
            if (userData.connectedLabel) {
              const labelPosition = userData.connectedLabel.position;
              const geometry = line.geometry;
              const positions = geometry.attributes.position.array;

              // Get the label's animation state
              const labelUserData = userData.connectedLabel.userData;
              const labelState = labelUserData.animationState;

              // Update appearance based on label state
              if (labelState === 'emerging') {
                // When emerging, make the line grow with the label
                const earthRadius = 2;
                const earthPosition = new THREE.Vector3(0, 0, 0);

                // Calculate direction vector from Earth to label
                const direction = new THREE.Vector3().subVectors(labelPosition, earthPosition).normalize();

                // Start position - slightly outside Earth's surface
                const startPosition = direction.clone().multiplyScalar(earthRadius * 1.05);

                // Create curved path points that grow with the label movement
                const segments = positions.length / 3 - 1;

                for (let i = 0; i <= segments; i++) {
                  const t = i / segments;

                  // Create a curved path that follows the label
                  const x = startPosition.x + (labelPosition.x - startPosition.x) * t;
                  const y = startPosition.y + (labelPosition.y - startPosition.y) * t;
                  const z = startPosition.z + (labelPosition.z - startPosition.z) * t;

                  // Update point position
                  positions[i * 3] = x;
                  positions[i * 3 + 1] = y;
                  positions[i * 3 + 2] = z;
                }

                // Adjust line opacity to match label
                line.material.opacity = userData.originalOpacity * labelUserData.animationProgress;

              } else if (labelState === 'returning') {
                // When returning, make the line shrink with the label
                const earthRadius = 2;
                const earthPosition = new THREE.Vector3(0, 0, 0);

                // Calculate direction vector from Earth to label
                const direction = new THREE.Vector3().subVectors(labelPosition, earthPosition).normalize();

                // Start position - slightly outside Earth's surface
                const startPosition = direction.clone().multiplyScalar(earthRadius * 1.05);

                // Create curved path points that shrink with the label movement
                const segments = positions.length / 3 - 1;

                for (let i = 0; i <= segments; i++) {
                  const t = i / segments;

                  // Create a curved path that follows the label
                  const x = startPosition.x + (labelPosition.x - startPosition.x) * t;
                  const y = startPosition.y + (labelPosition.y - startPosition.y) * t;
                  const z = startPosition.z + (labelPosition.z - startPosition.z) * t;

                  // Update point position
                  positions[i * 3] = x;
                  positions[i * 3 + 1] = y;
                  positions[i * 3 + 2] = z;
                }

                // Fade out the line as the label returns
                line.material.opacity = userData.originalOpacity * (1 - labelUserData.animationProgress);

              } else {
                // When floating, just update the end position
                // Only update the end position (the label end)
                const endIdx = (positions.length / 3) - 1;
                positions[endIdx * 3] = labelPosition.x;
                positions[endIdx * 3 + 1] = labelPosition.y;
                positions[endIdx * 3 + 2] = labelPosition.z;

                // Pulse opacity for data flow effect
                const pulse = Math.sin(time * userData.pulseSpeed) * userData.pulseAmplitude;
                line.material.opacity = userData.originalOpacity + pulse;
              }

              // Mark for update
              geometry.attributes.position.needsUpdate = true;
            }
          });
        }
      }

      // Pulse the halo
      const time = Date.now() * 0.001;
      halo.material.opacity = 0.1 + Math.sin(time) * 0.1;

      renderer.render(scene, camera);
    }

    animate();

    // Handle window resizing
    window.addEventListener('resize', () => {
      const width = container.clientWidth;
      const height = container.clientHeight;

      renderer.setSize(width, height);
      camera.aspect = width / height;
      camera.updateProjectionMatrix();

      // Re-center the scene on resize
      renderer.domElement.style.position = 'absolute';
      renderer.domElement.style.left = '50%';
      renderer.domElement.style.top = '50%';
      renderer.domElement.style.transform = 'translate(-50%, -50%)';
    });
  }

  // Initialize the globe animation if Three.js is loaded
  if (typeof THREE !== 'undefined') {
    initGlobe();
  } else {
    console.error('Three.js is not loaded');
  }

  // Easing functions for smoother animations
  function easeOutCubic(x) {
    return 1 - Math.pow(1 - x, 3);
  }

  function easeInCubic(x) {
    return x * x * x;
  }
});
