// Search functionality for finding drivers by name or plate number
$("#submit").click(function (event) {
    event.preventDefault();
    $("#error").html("");
    var keyword = $("#input_search").val();
    if (keyword == null || keyword == "") {
      $("#error").html("Please input the name of a driver or a car plate number");
    }
  
    // Make AJAX request to search for drivers
    $.ajax({
      url: "../actions/searchdriver_action.php",
      method: "post",
      data: JSON.stringify({
        keyword: keyword,
      }),
      dataType: "json",
      success: (data, status) => {
        // console.log(data, status);
        if (data.status == 200) {
          var response = data;
          var resultContainer = $("#results");
          resultContainer.empty();
  
          // Process and display search results
          var results = response.data;
          if (results.length === 0) {
            resultContainer.html("<p>No results found</p>");
          } else {
            var resultsPerRow = 2;
            var result = "";
  
            // Build HTML for each search result
            for (var index = 0; index < results.length; index++) {
              if (index % resultsPerRow === 0) {
                resultContainer.append('<div class="row">');
              }
  
              var element = results[index];
              result += '<div class="searchresult">';
              result += '<div class="rating">';
              result += '<div class="heading"><p>RATING</p></div>';
              result +=
                '<div class="ratingbox"><p>' +
                element.average_rating +
                "</p></div>";
              result +=
                '<div class="text"><p>' +
                element.rating_count +
                " review(s)</p></div>";
              result += "</div>";
              result += '<div class="details">';
              result +=
                '<div class="dname"><p>' +
                element.driver_fname +
                " " +
                element.driver_lname +
                "</p></div>";
              result +=
                '<div class="dcplate"><p>' + element.plate_number + "</p></div>";
              result +=
                '<div class="dcomps"><p>' + element.company_name + "</p></div>";
              result += "</div>";
              result += '<div class="link">';
              result +=
                "<a href='../view/driverdetails.php?did=" +
                element.did +
                "'> View Driver Details </a>";
  
              // Add warning icon for low rated or frequently reported drivers
              if (element.incident_reports > 5 || element.average_rating < 2) {
                result +=
                  "<i class='fa-solid fa-triangle-exclamation' style='color:red'></i><span style='color:red'>";
              }
              result += "</div>";
              result += "</div>";
  
              // Add completed row to container
              if (
                (index + 1) % resultsPerRow === 0 ||
                index === results.length - 1
              ) {
                resultContainer.append(result);
                resultContainer.append("</div>");
                result = "";
              }
            }
          }
        }
      },
      // Handle any errors from the search request
      error: (error) => {
        var responseData = error.responseJSON.message;
        $("#error").html(responseData);
      },
    });
  });