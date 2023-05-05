massDelete = () => {
  let Products = $(".product_card");
  
  let selectedProducts = [];
  let amount = 0;
  for (let i = 0; i < Products.length; i++) {
    if (Products[i].getElementsByTagName("input")[0].checked) {
      selectedProducts.push(Products[i]);
    }
  }
  
  let elementsToDelete = "";
  for (let i = 0; i < selectedProducts.length; i++) {
    if (elementsToDelete != "") {
      elementsToDelete += "-" + selectedProducts[i].id;
    } else {
      elementsToDelete += selectedProducts[i].id;
    }
  }
  if (elementsToDelete.length == 0) {
    return;
  }

  $.ajax({
    url: "./php/delete_product.php",
    type: "POST",
    data: { toDelete: elementsToDelete },
    success: function (data) {$("body").html(data);},
  });
};

$(function () {
  $("input:checkbox").prop("checked", false);
});
