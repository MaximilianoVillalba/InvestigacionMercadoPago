// Fuente: https://www.jqueryscript.net/form/bootstrap-password-strendth-validator.html

DOM = {
  passwForm: '.validarClave',
  passwErrorMsg: '.validarClave__error',
  passwInput: document.querySelector('.validarClave__input'),
  passwVisibilityBtn: '.validarClave__visibility',
  passwVisibility_icon: '.validarClave__visibility-icon',
  strengthBar: document.querySelector('.validarClave__bar'),
  submitBtn: document.querySelector('.validarClave__submit') };


//*** HELPERS

//need to append classname with '.' symbol
const findParentNode = (elem, parentClass) => {

  parentClass = parentClass.slice(1, parentClass.length);

  while (true) {

    if (!elem.classList.contains(parentClass)) {
      elem = elem.parentNode;
    } else {
      return elem;
    }

  }

};

//*** MAIN CODE

const getPasswordVal = input => {
  return input.value;
};

const testPasswRegexp = (clave, regexp) => {

  return regexp.test(clave);

};

const testPassw = clave => {

  let fuerza = 'none';

/* Mis regex, en orden:

* Débil: Debe incluir solo números o solo letras, mínimo 2 caracteres
* Normal: Debe incluir números y letras, mínimo 2 caracteres
* Fuerte: Debe incluir números, letras y símbolos, mínimo 6 caracteres
* Insegura: Cuando solo se ingresa un caracter

*/
const debil = /(?=.*[a-zñáéíóúüÁÉÍÓÚÜÑ]).{2,}|(?=.*[\d]).{2,}/i;
const normal = /(?=.*[a-zñáéíóúüÁÉÍÓÚÜÑ])(?=.*[\d]).{2,}/i;
const fuerte = /(?=.*[a-zñáéíóúüÁÉÍÓÚÜÑ])(?=.*[\d])(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,.\/?¿¡]).{6,}/i;

/* Regex del plugin:
  const moderate = /(?=.*[A-Z])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[a-z]).{5,}|(?=.*[\d])(?=.*[A-Z])(?=.*[a-z]).{5,}/g;
  const strong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d]).{7,}|(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?])(?=.*[a-z])(?=.*[\d]).{7,}/g;
  const fuertestrong = /(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[\!@#$%^&*()\\[\]{}\-_+=~`|:;"'<>,./?]).{9,}/g;
*/

  if (testPasswRegexp(clave, fuerte)) {
    fuerza = 'fuerte';
  } else if (testPasswRegexp(clave, normal)) {
    fuerza = 'normal';
  } else if (testPasswRegexp(clave, debil)) {
    fuerza = 'debil';
  } else if (clave.length > 0) {
    fuerza = 'insegura';
  }

  return fuerza;

};

const testPasswError = clave => {

  const errorSymbols = /\s/g;

  return testPasswRegexp(clave, errorSymbols);

};

const setStrengthBarValue = (barra, fuerza) => {

  let valorFuerza;

  switch (fuerza) {
    case 'insegura':
      valorFuerza = 25;
      barra.setAttribute('aria-valuenow', valorFuerza);
      break;

    case 'debil':
      valorFuerza = 50;
      barra.setAttribute('aria-valuenow', valorFuerza);
      break;

    case 'normal':
      valorFuerza = 75;
      barra.setAttribute('aria-valuenow', valorFuerza);
      break;

    case 'fuerte':
      valorFuerza = 100;
      barra.setAttribute('aria-valuenow', valorFuerza);
      break;

    default:
      valorFuerza = 0;
      barra.setAttribute('aria-valuenow', 0);}


  return valorFuerza;

};

//also adds a text label based on styles
const setStrengthBarStyles = (barra, valorFuerza) => {

  barra.style.width = `${valorFuerza}%`;

  barra.classList.remove('bg-success', 'bg-info', 'bg-warning');

  // Se modifica el texto a español:
  switch (valorFuerza) {
    case 25:
      barra.classList.add('bg-danger');
      barra.textContent = 'Insegura';
      break;

    case 50:
      barra.classList.remove('bg-danger');
      barra.classList.add('bg-warning');
      barra.textContent = 'Débil';
      break;

    case 75:
      barra.classList.remove('bg-danger');
      barra.classList.add('bg-info');
      barra.textContent = 'Normal';
      break;

    case 100:
      barra.classList.remove('bg-danger');
      barra.classList.add('bg-success');
      barra.textContent = 'Fuerte';
      break;

    default:
      barra.classList.add('bg-danger');
      barra.textContent = '';
      barra.style.width = `0`;}


};

const setStrengthBar = (barra, fuerza) => {

  //setting value
  const valorFuerza = setStrengthBarValue(barra, fuerza);

  //setting styles
  setStrengthBarStyles(barra, valorFuerza);
};

const unblockSubmitBtn = (btn, fuerza) => {

  if (fuerza === 'none' || fuerza === 'insegura') {
    btn.disabled = true;
  } else {
    btn.disabled = false;
  }

};

const findErrorMsg = input => {
  const passwForm = findParentNode(input, DOM.passwForm);
  return passwForm.querySelector(DOM.passwErrorMsg);
};

const showErrorMsg = input => {
  const errorMsg = findErrorMsg(input);
  errorMsg.classList.remove('js-hidden');
};

const hideErrorMsg = input => {
  const errorMsg = findErrorMsg(input);
  errorMsg.classList.add('js-hidden');
};

const passwordStrength = (input, strengthBar, btn) => {

  //getting password
  const clave = getPasswordVal(input);

  //check if there is an error
  const error = testPasswError(clave);

  if (error) {

    showErrorMsg(input);

  } else {

    //hide error messages
    hideErrorMsg(input);

    //finding fuerza
    const fuerza = testPassw(clave);

    //setting fuerza barra (value and styles)
    setStrengthBar(strengthBar, fuerza);

    //unblock submit btn only if password is debil or normaler
    unblockSubmitBtn(btn, fuerza);
  }

};

const passwordVisible = passwField => {

  const passwType = passwField.getAttribute('type');

  let visibilityStatus;

  if (passwType === 'text') {

    passwField.setAttribute('type', 'password');

    visibilityStatus = 'hidden';

  } else {

    passwField.setAttribute('type', 'text');

    visibilityStatus = 'visible';

  }

  return visibilityStatus;

};

const changeVisibiltyBtnIcon = (btn, status) => {

  const hiddenPasswIcon = btn.querySelector(`${DOM.passwVisibility_icon}[data-visible="hidden"]`);

  const visibilePasswIcon = btn.querySelector(`${DOM.passwVisibility_icon}[data-visible="visible"]`);

  if (status === 'visible') {
    visibilePasswIcon.classList.remove('js-hidden');
    hiddenPasswIcon.classList.add('js-hidden');
  } else if (status === 'hidden') {
    visibilePasswIcon.classList.add('js-hidden');
    hiddenPasswIcon.classList.remove('js-hidden');
  }

};

const passwVisibilitySwitcher = (passwField, visibilityToggler) => {

  const visibilityStatus = passwordVisible(passwField);

  changeVisibiltyBtnIcon(visibilityToggler, visibilityStatus);
};


//*** EVENT LISTENERS
DOM.passwInput.addEventListener('input', () => {
  passwordStrength(DOM.passwInput, DOM.strengthBar, DOM.submitBtn);
});

const passwVisibilityBtn = document.querySelector(DOM.passwVisibilityBtn);

passwVisibilityBtn.addEventListener('click', e => {

  let toggler = findParentNode(e.target, DOM.passwVisibilityBtn);

  passwVisibilitySwitcher(DOM.passwInput, toggler);

});