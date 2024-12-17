
// Wait for DOM content to load before executing
document.addEventListener("DOMContentLoaded", function () {

    // Make AJAX request to fetch forum posts
    $.ajax({
      url: "../actions/getposts_action.php",
      method: "get", 
      dataType: "json",
      success: (data, status) => {
        console.log(data, status);
        if (data.status == 201) {
          response = data;
          let result = "";
          var reviewContainer = $("#reviews");
          reviewContainer.empty();
  
          var resultsPerRow = 2;
  
          // Loop through posts and build HTML for each
          for (var index = 0; index < response.data.length; index++) {
            var element = response.data[index];
  
            // Build card HTML structure
            result += "<div class='card card2'>";
            result += "<p class='close'></p>";
            result += "<p class='desc' id='desc'>" + element.post_text + "</p>";
            result +=
              "<div style='display: flex; justify-content: space-between; align-items: center;'>"; // Flex container
            
            // Add like button and counter
            result += "<span data-posid='" + element.posid + "'>";
            result +=
              "<i class='fa-solid fa-heart' id='like-button' data-posid='" +
              element.posid +
              "'style='font-size: 20px;color:white;margin-right:20px;'></i>";
            result +=
              "<p style='font-size: 20px;color:white;margin-right:20px;display: inline-block;' id='engagement_count'></p>";
            result += "</span>";

            // Add delete button for post creator
            if (element.creator == response.user_id) {
              result += "<span>";
              result +=
                "<i id='deleteAction' onclick='confirmDelete(" +
                element.posid +
                "); return false;' class='fa-solid fa-trash' style='color:white;font-size: 20px;'></i>";
              result += "</span>";
            }
            result += "</div>";
            result += "</div>";
  
            // Add row of posts to container
            if (
              (index + 1) % resultsPerRow === 0 ||
              index === response.data.length - 1
            ) {
              reviewContainer.append(result);
              reviewContainer.append("</div>");
              result = "";
            }
          }
        }
      },
  
      // Handle any errors from the AJAX request
      error: (error) => {
        var responseData = JSON.parse(error.responseText);
        document.getElementById("error").innerHTML = responseData.message;
      },
    });
  });