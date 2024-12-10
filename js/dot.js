//  Dấu * sẽ có màu đỏ khi trường input trống và màu bình thường (inherit) khi có giá trị.  
document.addEventListener('DOMContentLoaded', function() {
    const requiredInputs = document.querySelectorAll('input[required]');
    const labels = document.querySelectorAll('label');
    
    function updateAsterisk(input) {
      const label = document.querySelector(`label[for="${input.id}"]`);
      if (label) {
        const asterisk = label.querySelector('.asterisk') || document.createElement('span');
        asterisk.className = 'asterisk';
        asterisk.style.color = input.value ? 'inherit' : 'red';
        asterisk.textContent = ' *';
        if (!label.querySelector('.asterisk')) {
          label.appendChild(asterisk);
        }
      }
    }

    requiredInputs.forEach(input => {
      updateAsterisk(input);
      input.addEventListener('input', () => updateAsterisk(input));
    });
  });
    // Thay đ��i màu đậm cho phần mã sinh viên khi trống
