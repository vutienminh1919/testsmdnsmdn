$(document).ready(function () {
    $(".navbar-brand").html("Minh");
    let data = []


    $.ajax(
        {
            url: "https://api.github.com/users/vutienminh1919/repos",
            type: "GET",
            dataType: "json",
        }
    ).done(function (response) {
        console.log(response)
        data = response
        displayProduct(response)})

    $("#search-input").on("input",search);
    function search(){
        let searchValue = $(this).val();
        let result = [];
        for (let i = 0;i<data.length;i++){
            if (data[i].name.toLowerCase().includes(searchValue.toLowerCase())){
                result.push(data[i]);
            }
        }
        displayProduct(result);

    }


    function displayProduct(products){
        let html = "";
        for (let i = 0; i < products.length; i++) {
            html += `<tr>
 <td>${products[i].id}</td>
<td>${products[i].name}</td>
</tr>`

        }
        $(".list-repo").html(html);
    }






});
