'use strict'

function update(e) {
   let select = document.getElementById('productType').options;
   document.querySelector('.type-container').setAttribute("value", select[e].textContent);
   console.log(document.querySelector('.type-container').value);

   for (let j = 0; j < select.length; j++) {
      let element = select[j];
      const inputListContainer = document.querySelector("." + (element.value).toString());
      let inputList = inputListContainer.querySelectorAll('.form-control');

      if (element == select[e]) {
         document.querySelector("." + (element.value).toString()).classList.remove("hide");

         if (inputList) {
            inputList.forEach(element => {
               element.setAttribute("required", "")
            });
         }
      }
      else {
         document.querySelector("." + (element.value).toString()).classList.add("hide");

         if (inputList) {
            inputList.forEach(element => {
               element.removeAttribute("required");
               element.value = null;
            });
         }
      }
   }
}

(function () {
   var forms = document.querySelectorAll('.needs-validation')

   Array.prototype.slice.call(forms)
      .forEach(function (form) {
         form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
            }

            form.classList.add('was-validated')
            customValidate();
         }, false)
      })
})()

function customValidate() {
   const idList = ['sku', 'name', 'price', 'size', 'height', 'width', 'length', 'weight'];
   const feedbackList = document.querySelectorAll('.invalid-feedback');

   for (let i = 0; i < idList.length; i++) {
      let element = document.querySelector("#" + idList[i]);

      if (element.validity.valid == false && element.value != "")
         feedbackList[i].textContent = "Please, provide the data of indicated type.";
   }
}