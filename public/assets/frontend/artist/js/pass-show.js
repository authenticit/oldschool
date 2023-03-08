let allPassArea = document.querySelectorAll('input[type="password"');
allPassArea.forEach(function (value) {
    value.style.cssText = 'width: 100%; ';
    // Icon Class name;
    let openEyeClassName = 'far fa-eye';
    let closeEyeClassName = 'far fa-eye-slash';
    let passArea = document.createElement('div');
    passArea.classList.add('password_area');
    let eyeOn = document.createElement('i');
    eyeOn.setAttribute('class', openEyeClassName);
    passArea.appendChild(value.cloneNode(true));
    value.parentNode.replaceChild(passArea, value);
    passArea.appendChild(eyeOn);
    eyeOn.addEventListener('click', function (e) {
        if (e.target.classList.value == openEyeClassName) {
            this.setAttribute('class', closeEyeClassName);
            this.previousSibling.setAttribute('type', 'text');
        } else if (e.target.classList.value == closeEyeClassName) {
            this.setAttribute('class', openEyeClassName);
            this.previousSibling.setAttribute('type', 'password');
        }
    });

    // CSS;
    passArea.style.cssText = 'position: relative;';
    eyeOn.style.cssText = 'position: absolute; z-index: 1; top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; color: #666666;';

});