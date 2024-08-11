function productFormValidation(){

    let productName = document.getElementById("product_name").value.trim();
    let productDescription = document.getElementById("product_description").value.trim();
    let productPrice = document.getElementById("product_price").value.trim();
    let productImage = document.getElementById("product_image").value.trim();

    let productNamePattern = /^[A-Za-z]+$/;
    let productImagePattern = /\.(png|jpg|jpeg|gif|bmp)$/i;

    if (productName === "") {
        alert("Product name must be filled out");
        return false;
    } else if (!productName.match(productNamePattern)) {
        alert("Product name can only contain letters");
        return false;
    }

    if (productDescription === "") {
        alert("Product description must be filled out");
        return false;
    } else if (productDescription.length < 10) {
        alert("Product description must be at least 10 characters long");
        return false;
    }

    if (productPrice === "") {
        alert("Product price must be filled out");
        return false;
    } else if (isNaN(productPrice) || parseFloat(productPrice) <= 0) {
        alert("Please enter a valid positive number for the product price");
        return false;
    }

    if (productImage === "") {
        alert("Product image URL must be filled out");
        return false;
    } else if (!productImage.match(productImagePattern)) {
        alert("Please enter a valid image URL (jpg, jpeg, png, gif, bmp)");
        return false;
    }

    return true;
}
