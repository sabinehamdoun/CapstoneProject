$(document).ready(function () {
  $("form").submit(function (e) {
    e.preventDefault();
    var title = $("input[name='title']").val();
    if (title == "") {
      alert("Title is required!");
      return false;
    }
    $.ajax({
      type: "POST",
      url: "../php/get.php",
      data: { title: title },
      success: function (response) {
        var item = JSON.parse(response);
        var title = item.title;
        var brand = item.brand;
        var category = item.category;
        var description = item.description;
        var price = item.price;
        var location = item.location;
        var date = item.date;
        var image = item.image;
        // Create a new tr element to display the new item
        var tr = $("<tr></tr>");
        var imgTd = $("<td class='product-thumb'></td>");
        var img = $("<img width='80px' height='auto'>").attr(
          "src",
          "data:image/jpeg;base64," + image
        );
        imgTd.append(img);
        tr.append(imgTd);
        var detailsTd = $("<td class='product-details'></td>");
        var title = $("<h3 class='title'></h3>").text(
          title + " " + description
        );
        var dateSpan = $(
          "<span><strong>Posted on: </strong><time></time> </span>"
        ).text(date);
        var locationSpan = $(
          "<span class='location'><strong>Location</strong></span>"
        ).text(location);
        var priceSpan = $(
          "<span class='price'><strong>Price</strong></span>"
        ).text(price);
        detailsTd.append(title, dateSpan, locationSpan, priceSpan);
        tr.append(detailsTd);
        var categoryTd = $("<td class='product-category'></td>");
        var categorySpan = $("<span class='categories'></span>").text(category);
        categoryTd.append(categorySpan);
        tr.append(categoryTd);
        var actionTd = $("<td class='action' data-title='Action'></td>");
        var ul = $("<ul class='list-inline justify-content-center'></ul>");
        var li1 = $("<li class='list-inline-item'></li>");
        var viewLink = $("<a></a>")
          .attr("data-toggle", "tooltip")
          .attr("data-placement", "top")
          .attr("title", "Tooltip on top")
          .attr("class", "view")
          .attr("href", "#")
          .text("View");
        li1.append(viewLink);
        var li2 = $("<li class='list-inline-item'></li>");
        var editLink = $("<a></a>")
          .attr("class", "edit")
          .attr("href", "#")
          .text("Edit");
        li2.append(editLink);
        var li3 = $("<li class='list-inline-item'></li>");
        var deleteLink = $("<a></a>")
          .attr("class", "delete")
          .attr("href", "#")
          .text("Delete");
        li3.append(deleteLink);
        ul.append(li1, li2, li3);
        actionTd.append(ul);
        tr.append(actionTd);
        $("#myTable tbody").append(tr);
        window.location.href = "../php/dashboard.php";
      },
    });
  });
});

/*$("#submit-form").click(function (e) {
  e.preventDefault();
  if (!$("#your-form-id")[0].checkValidity()) {
    // handle invalid form
  } else {
    var title = $("#title").val();
    $.ajax({
      type: "POST",
      url: "../php/get.php",
      data: { title: title },
      success: function (response) {
        // your existing success callback code here
      },
    });
  }
});*/

/*$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../php/get.php",
    data: { title: data },
    success: function (response) {
      var item = JSON.parse(response);
      var title = item.title;
      var brand = item.brand;
      var category = item.category;
      var description = item.description;
      var price = item.price;
      var location = item.location;
      var date = item.date;
      var image = item.image;
      // Create a new tr element to display the new item
      var tr = $("<tr></tr>");
      var imgTd = $("<td class='product-thumb'></td>");
      var img = $("<img width='80px' height='auto'>").attr(
        "src",
        "data:image/jpeg;base64," + image
      );
      imgTd.append(img);
      tr.append(imgTd);
      var detailsTd = $("<td class='product-details'></td>");
      var title = $("<h3 class='title'></h3>").text(title + " " + description);
      var dateSpan = $(
        "<span><strong>Posted on: </strong><time></time> </span>"
      ).text(date);
      var locationSpan = $(
        "<span class='location'><strong>Location</strong></span>"
      ).text(location);
      var priceSpan = $(
        "<span class='price'><strong>Price</strong></span>"
      ).text(price);
      detailsTd.append(title, dateSpan, locationSpan, priceSpan);
      tr.append(detailsTd);
      var categoryTd = $("<td class='product-category'></td>");
      var categorySpan = $("<span class='categories'></span>").text(category);
      categoryTd.append(categorySpan);
      tr.append(categoryTd);
      var actionTd = $("<td class='action' data-title='Action'></td>");
      var ul = $("<ul class='list-inline justify-content-center'></ul>");
      var li1 = $("<li class='list-inline-item'></li>");
      var viewLink = $("<a></a>")
        .attr("data-toggle", "tooltip")
        .attr("data-placement", "top")
        .attr("title", "Tooltip on top")
        .attr("class", "view")
        .attr("href", "#")
        .text("View");
      li1.append(viewLink);
      var li2 = $("<li class='list-inline-item'></li>");
      var editLink = $("<a></a>")
        .attr("class", "edit")
        .attr("href", "#")
        .text("Edit");
      li2.append(editLink);
      var li3 = $("<li class='list-inline-item'></li>");
      var deleteLink = $("<a></a>")
        .attr("class", "delete")
        .attr("href", "#")
        .text("Delete");
      li3.append(deleteLink);
      ul.append(li1, li2, li3);
      actionTd.append(ul);
      tr.append(actionTd);
      $("table #myTable tbody").append(tr);
    },
  });
});*/

/*$("#form").submit(function (e) {
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    type: "POST",
    url: "addItem.php",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (data) {
      // data is the title of the item that was inserted into the db
      $.ajax({
        type: "POST",
        url: "../php/get.php",
        data: { title: data },
        success: function (response) {
          // response is the new item in JSON format
          var item = JSON.parse(response);
          var title = item.title;
          var brand = item.brand;
          var category = item.category;
          var description = item.description;
          var price = item.price;
          var location = item.location;
          var date = item.date;
          var image = item.image;
          // Create a new div element to display the new item
          var div = document.createElement("div");
          div.classList.add("product-item", "bg-light");
          div.innerHTML =
            '<div class="card">' +
            '<div class="thumb-content">' +
            '<a href="">' +
            '<img class="card-img-top img-fluid" src="data:image/jpeg;base64,' +
            image +
            '" alt="Card image cap">' +
            "</a>" +
            "</div>" +
            '<div class="card-body">' +
            '<h4 class="card-title"><a href="">' +
            title +
            "</a></h4>" +
            '<ul class="list-inline product-meta">' +
            '<li class="list-inline-item">' +
            '<a href=""><i class="fa fa-folder-open-o"></i>' +
            category +
            "</a>" +
            "</li>" +
            '<li class="list-inline-item">' +
            '<a href=""><i class="fa fa-calendar"></i>' +
            date +
            "</a>" +
            "</li>" +
            "</ul>" +
            '<p class="card-text">' +
            description +
            "</p>" +
            "</div>" +
            "</div>";
          // Append the new div element to the existing container
          document.getElementById("row").appendChild(div);
        },
      });
    },
  });
});*/
