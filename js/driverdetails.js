/**
 * Driver Details JavaScript Module
 * Handles fetching and displaying driver information on the driver details page
 */

// Wait for DOM to be fully loaded before executing
document.addEventListener("DOMContentLoaded", function () {
    /**
     * Extracts URL parameter value by name
     * @param {string} name - The parameter name to extract
     * @returns {string} The decoded parameter value or empty string if not found
     */
    function getUrlParameter(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
      var results = regex.exec(location.search);
      return results === null
        ? ""
        : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    // Get driver ID from URL parameters
    var driverId = getUrlParameter("did");

    // Make AJAX request to fetch driver details
    $.ajax({
      url: "../actions/driverdetail_action.php",
      method: "post",
      data: JSON.stringify({ driverId: driverId }),
      dataType: "json",
      success: (data, status) => {
        console.log(data, status);
        if (data.status == 200) {
          response = data;
  
          // Update DOM elements with driver information
          document.getElementById("drivername").innerHTML =
            response.data.driver_fname + " " + response.data.driver_lname;
          document.getElementById("carplate").innerHTML =
            response.data.plate_number;
          document.getElementById("contact").innerHTML = response.data.driver_tel;
          document.getElementById("numreviews").innerHTML =
            response.data.review_count;
          document.getElementById("rhcomp").innerHTML =
            response.data.company_name;

          // Set default rating to 0 if not available
          if (!response.data.average_rating) {
            response.data.average_rating = 0;
          }
          document.getElementById("avgrating").innerHTML =
            response.data.average_rating;

          // Display car details
          document.getElementById("cardetails").innerHTML =
            response.data.car_color +
            " " +
            response.data.car_make +
            " " +
            response.data.car_model;

          // Display gender (1 = Male, 2 = Female)
          if (response.data.gender == 1) {
            document.getElementById("gender").innerHTML = "Male";
          } else {
            document.getElementById("gender").innerHTML = "Female";
          }
        }
      },
      error: (error) => {
        // Log any errors that occur during the AJAX request
        console.log(error);
      },
    });
  });