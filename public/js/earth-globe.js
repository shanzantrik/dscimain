// Three.js Digital Earth Animation
import * as THREE from 'three';

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
  camera.position.z = 5;

  // Create the renderer
  const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  renderer.setSize(width, height);
  renderer.setClearColor(0x000000, 0); // Transparent background

  // Clear container and append renderer
  container.innerHTML = '';
  container.appendChild(renderer.domElement);

  // Create a wireframe sphere geometry
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

  // Add some point particles
  const particlesGeometry = new THREE.BufferGeometry();
  const particlesCount = 200;
  const posArray = new Float32Array(particlesCount * 3);

  for (let i = 0; i < particlesCount * 3; i++) {
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

  // Add binary text circles
  const createBinaryRing = (radius, segments, color, opacity) => {
    const ringGeometry = new THREE.RingGeometry(radius - 0.1, radius, segments);
    const ringMaterial = new THREE.MeshBasicMaterial({
      color: color,
      transparent: true,
      opacity: opacity,
      side: THREE.DoubleSide
    });
    const ring = new THREE.Mesh(ringGeometry, ringMaterial);
    ring.rotation.x = Math.PI / 2; // Lay flat
    return ring;
  };

  // Add multiple binary rings at different distances
  const ring1 = createBinaryRing(3.0, 64, 0x01b380, 0.3);
  const ring2 = createBinaryRing(3.6, 64, 0x01b380, 0.2);
  const ring3 = createBinaryRing(4.2, 64, 0x01b380, 0.1);

  scene.add(ring1);
  scene.add(ring2);
  scene.add(ring3);

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

      ring1.rotation.z += deltaMove.x * 0.005;
      ring2.rotation.z -= deltaMove.x * 0.003;
      ring3.rotation.z += deltaMove.x * 0.002;
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

      ring1.rotation.z += 0.001;
      ring2.rotation.z -= 0.0015;
      ring3.rotation.z += 0.0005;
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
  });
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initGlobe);

// Export for direct use
export { initGlobe };
