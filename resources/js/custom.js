jQuery(document).ready(function ($) {
    geProductData();
    $(document).on("click", "#submit_data", function (e) {
        e.preventDefault();
        var form = document.querySelector("form");
        var data = new FormData(form);
        axios
            .post("/products", data)
            .then((response) => {
                $("#success").html("");
                $("#success").append("<li>Product created.</li>");
                form.reset();
                geProductData();
            })
            .catch((error) => {
                //$("#errors").append;
                printErrorMsg(error.response.data.errors);
                console.log(error.response.data.errors);
            });
    });
});
function geProductData() {
    axios
        .get("/")
        .then((response) => {
            $("#productList tbody").html("");
            $("#productList tfoot").html("");
            $.each(response.data.data, function (key, value) {
                $("#productList tbody").prepend(
                    "<tr><td>" +
                        value.product_name +
                        "</td>" +
                        "<td>" +
                        value.qty +
                        "</td>" +
                        "<td>" +
                        value.price +
                        "</td>" +
                        "<td>" +
                        value.created_at +
                        "</td>" +
                        "<td>" +
                        value.qty * value.price +
                        "</td></tr>"
                );
            });
            $("#productList tfoot").append(
                "<tr><td colspan='2'>Total Value numbers</td><td></td><td></td><td>" +
                    response.data.totalSum +
                    "</td></tr>"
            );
        })
        .catch((error) => {
            console.log(error);
        });
}
function printErrorMsg(msg) {
    $("#errors").html("");
    $.each(msg, function (key, value) {
        $("#errors").append("<li>" + value + "</li>");
    });
}
