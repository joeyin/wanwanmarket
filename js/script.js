window.onload = function () {
  const imageButton = document.getElementById("image-add");
  const deleteButton = document.getElementById("product-delete");

  if (imageButton) {
    imageButton.onclick = function () {
      this.parentElement.parentElement.insertAdjacentHTML(
        "beforeend",
        `<div class="input-group mb-1">
            <span class="input-group-text">
              <i class="fas fa-image"></i>
            </span>
            <input type="url" class="form-control" id="images" name="images[]"/>
          </div>`
      );
    };
  }

  if (deleteButton) {
    deleteButton.onclick = function () {
      if (window.confirm("Are you sure you want to delete the item ?")) {
        if (this.getAttribute("data-pid")) {
          location.href = `./delete.php?id=${this.getAttribute(
            "data-pid"
          )}`;
        }
      }
    };
  }

  var forms = document.querySelectorAll(".needs-validation");
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add("was-validated");
      },
      false
    );
  });
};

ClassicEditor.create(document.querySelector("#slogan"), {
  toolbar: {
    items: [
      "undo",
      "redo",
      "|",
      "heading",
      "|",
      "bold",
      "italic",
      "|",
      "link",
      "blockQuote",
      "|",
      "bulletedList",
      "numberedList",
      "outdent",
      "indent",
    ],
    shouldNotGroupWhenFull: true,
  },
})

ClassicEditor.create(document.querySelector("#description"), {
  height: ["500px"],
  toolbar: {
    items: [
      "undo",
      "redo",
      "|",
      "heading",
      "|",
      "bold",
      "italic",
      "|",
      "link",
      "blockQuote",
      "|",
      "bulletedList",
      "numberedList",
      "outdent",
      "indent",
    ],
    shouldNotGroupWhenFull: true,
  },
});
