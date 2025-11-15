const targetMin = -10;
const targetMax = 25;
let currentPercent = targetMin;
let targetPercent = targetMin;
const tweenSpeed = 0.040;

document.addEventListener("scroll", () => {
  const scrollTop = window.scrollY;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
  let scrollFraction = scrollTop / docHeight;
  targetPercent = targetMin + (targetMax - targetMin) * scrollFraction;
});

function animate() {
  currentPercent += (targetPercent - currentPercent) * tweenSpeed;
  document.documentElement.style.setProperty('--scroll-percent', currentPercent + '%');
  requestAnimationFrame(animate);
}

animate();
