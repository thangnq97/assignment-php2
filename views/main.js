let form = document.querySelector(".form");
let user_name = document.querySelector(".user_name");
let email = document.querySelector(".email");
let phone = document.querySelector(".phone");
let message = document.querySelector(".message");
let item1_btn_sum = document.querySelector(
  ".item1_btn_sum"
);
let item1_input = document.querySelector(".item1_input");
let item1_btn_sub = document.querySelector(
  ".item1_btn_sub"
);
let item2_btn_sum = document.querySelector(
  ".item2_btn_sum"
);
let item2_input = document.querySelector(".item2_input");
let item2_btn_sub = document.querySelector(
  ".item2_btn_sub"
);
let total_price1 = document.querySelector(".total_price1");
let total_price2 = document.querySelector(".total_price2");

function check() {
  if (user_name.value.trim() == "") {
    alert("Vui lòng nhập tên");
    return false;
  } else if (user_name.value.trim().length < 8) {
    alert("Tên tối thiểu 8 ký tự");
    return false;
  }

  if (email.value.trim() == "") {
    alert("Vui lòng nhập email");
    return false;
  } else if (
    email.value.trim().indexOf("@") == -1 ||
    email.value.trim().indexOf(".") == -1
  ) {
    alert("Không đúng định dạng email");
    return false;
  }

  if (phone.value.trim() == "") {
    alert("Vui lòng nhập số điện thoại");
    return false;
  } else if (isNaN(phone.value.trim()) == true) {
    alert("Không đúng định dạng số điện thoại");
    return false;
  }
  if (message.value.trim() == "") {
    alert("Vui lòng nhập tin nhắn");
    return false;
  }
  return true;
}

if (form) {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (check()) {
      localStorage.setItem("name", user_name.value.trim());
      user_name.value = "";
      localStorage.setItem("email", email.value.trim());
      email.value = "";
      localStorage.setItem("phone", phone.value.trim());
      phone.value = "";
      localStorage.setItem("message", message.value.trim());
      message.value = "";
    }
  });
}

//
function setPrice() {
  total_price1.innerHTML =
    item1_input.value * 512 + item2_input.value * 125;
  total_price2.innerHTML =
    item1_input.value * 512 + item2_input.value * 125;
}

item1_btn_sum.addEventListener("click", () => {
  item1_input.value++;
  setPrice();
});
item1_btn_sub.addEventListener("click", () => {
  item1_input.value--;
  if (item1_input.value < 0) {
    item1_input.value = 1;
  }
  setPrice();
});
item1_input.addEventListener("change", () => {
  if (isNaN(item1_input.value) == true) {
    item1_input.value = 1;
  }
  setPrice();
});
item2_btn_sum.addEventListener("click", () => {
  item2_input.value++;
  setPrice();
});
item2_btn_sub.addEventListener("click", () => {
  item2_input.value--;
  if (item2_input.value < 0) {
    item2_input.value = 1;
  }
  setPrice();
});
item2_input.addEventListener("change", () => {
  if (isNaN(item2_input.value) == true) {
    item2_input.value = 1;
  }
  setPrice();
});

setPrice();
