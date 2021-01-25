/**
 * @param {NodeList<HTMLInputElement>} radios 
 */
const getCheckedRadio = function(radios) {
    for(let i = 0; i < radios.length; i++) {
        if(radios[i].checked) return radios[i]; 
    }
    return null;
};

const getFormData = function() {
    const vorname = document.querySelector("[name=vorname]").value;
    const nachname = document.querySelector("[name=nachname]").value;
    const job = getCheckedRadio(document.querySelectorAll("[name=jobs]"))?.value || -1;
    const school = getCheckedRadio(document.querySelectorAll("[name=schools]"))?.value || -1;
    const apprenticeship = document.querySelector(`[name=lb_${school}]`)?.value || -1;

    return {
        firstName: vorname,
        lastName: nachname,
        job: job,
        school: school,
        apprenticeship: apprenticeship
    };   
};

const showAlert = function(message, type) {
    const alert = document.querySelector("#alert");
    [...alert.classList].filter(x => x.startsWith("alert-")).forEach(x => alert.classList.remove(x));
    alert.classList.add(type);
    if(Array.isArray(message)) {
        message = message.map(x => `<text>${x}</text>`);
        message = message.join("<br>");
    }
    alert.innerHTML = message;
    $(document.querySelector("#alert")).fadeIn();
};

const hideAlert = function() {
    $(document.querySelector("#alert")).fadeOut();
};

const showModal = function(message, title, yesCallback, noCallback) {
    if(Array.isArray(message)) {
        message = message.map(x => `<text>${x}</text>`);
        message = message.join("<br>");
    }

    if(Array.isArray(title)) {
        title = message.map(x => `<text>${x}</text>`);
        title = message.join("<br>");
    }

    const modal = document.querySelector("#modal");
    document.querySelector("#modal-text").innerHTML = message;
    document.querySelector("#modal-title").innerHTML = title;
    if(yesCallback) {
        const modalYes = document.querySelector("#modal-yes");
        const cb = () => {
            modalYes.removeEventListener("click", cb);
            yesCallback();
        };
        modalYes.addEventListener("click", cb);
    }

    if(noCallback) {
        const modalNo = document.querySelector("#modal-no");
        const cb = () => {
            modalNo.removeEventListener("click", cb);
            noCallback();
        };
        modalNo.addEventListener("click", cb);
    }
    
    $(modal).modal();
};

const doPostRequest = function(formData) {
    $.post("#", formData, (data) => {
        const parsedData = JSON.parse(data);
        
        if(parsedData.ALERT && parsedData.ALERT_TYPE) {
            showAlert(parsedData.ALERT, parsedData.ALERT_TYPE);
        } else {
            hideAlert();
        }

        if(parsedData.MODAL && parsedData.MODAL_TITLE) {
            showModal(parsedData.MODAL, parsedData.MODAL_TITLE, () => {
                formData.ignore_existing = true;
                doPostRequest(formData);
            });
        }
    });
};

window.addEventListener("load", () => {
    // Cancel submitting
    const alert = document.querySelector("#alert");
    const form = document.querySelector("#form");
    form.onsubmit = () => false;
    form.addEventListener("submit", () => {
        const formData = getFormData();
        const { vorname,
                nachname,
                job,
                school,
                apprenticeship } = formData;

        formData.ignore_existing = false;
        doPostRequest(formData);
    });
});
