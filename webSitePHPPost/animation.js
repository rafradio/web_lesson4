function Temperature() {
    this.shapeBorder = document.querySelector('.shape');
    this.input = document.querySelectorAll('.form-field__input, .form-field__textarea');
    this.input_f = document.querySelectorAll('.test');
    this.input_lab = document.querySelectorAll('.form-field__label');
    this.calcButton = document.querySelectorAll('.calcButton');
    this.resetButton = document.querySelector('.resetToZero');
}

Temperature.prototype.initSettings = function() {
    this.checkFormValue();
    this.shapeBorder.classList.add("shapeAnimate");
    this.input[0].addEventListener('focus', () => this.checking(0)); 
    this.input[0].addEventListener('blur', () => this.check_out(0));
    this.input[0].addEventListener("keypress", (event) => this.convertTempButton(event));
    this.calcButton[0].addEventListener('click', () => this.convertTemp());
    this.resetButton.addEventListener('click', () => this.resetToZero());
}

Temperature.prototype.checkFormValue = function() {
    if (this.input[0].value != '') {
        this.checking(0);
        this.convertTemp();
    }
}
Temperature.prototype.convertTempButton = function(event) {
    if (event.key === "Enter") {
        //event.preventDefault();
        this.convertTemp();
    }
}

Temperature.prototype.checking = function(x) {
    this.shapeBorder.classList.remove("shapeAnimate");
    this.shapeBorder.classList.toggle("shapeActive")
    this.input_f[x].classList.add("form-field__active");
    this.input_lab[x].classList.add("label_active");
}

Temperature.prototype.check_out = function(y) {
    this.shapeBorder.classList.add("shapeAnimate");
    this.shapeBorder.classList.toggle("shapeActive");

    if (this.input[y].value == '') {
        console.log("hello");
        this.input_f[y].classList.remove("form-field__active");
        this.input_lab[y].classList.remove("label_active");
    } else {
        this.input_f[y].classList.remove("form-field__active");
        this.input_lab[y].classList.remove("label_active");
        this.input_lab[y].classList.add("label_active_filled");
    };
}

Temperature.prototype.convertTemp = function() {
    if (this.input[0].value != '') {
        let celcii = Number.parseFloat(this.input[0].value);
        this.input_f[1].classList.add("form-field__active");
        this.input_lab[1].classList.add("label_active");
        this.input[1].value = ((9 / 5) * celcii + 32).toFixed(1);
    }
}

Temperature.prototype.resetToZero = function() {
    if (this.input[0].value != '') {
//        this.shapeBorder.classList.add("shapeAnimate");
//        this.shapeBorder.classList.toggle("shapeActive");
        this.input[0].value = '';
        this.input[1].value = '';
        this.input_lab[0].classList.remove("label_active");
//        this.input_lab[0].classList.remove("label_active_filled");
        this.input_f[1].classList.remove("form-field__active");
        this.input_lab[1].classList.remove("label_active");
    }
}

let farengeit = new Temperature();
farengeit.initSettings();

