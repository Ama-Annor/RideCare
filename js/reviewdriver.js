
// Event listener for when DOM content is fully loaded
document.addEventListener("DOMContentLoaded", function () {
    // Initialize star rating functionality
    const stars = document.querySelectorAll(".stars i");
  
    let selectedStar = 0;
    let selectedCompany = "";
  
    // Handle star rating selection
    stars.forEach((star, index1) => {
      star.addEventListener("click", () => {
        selectedStar = index1 + 1;
        stars.forEach((star, index2) => {
          index1 >= index2
            ? star.classList.add("active")
            : star.classList.remove("active");
        });
      });
    });
  
    // Handle ride-hailing company selection
    $("#rideHailingCompany").change(function () {
      selectedCompany = $(this).val();
    });

    // Handle form submission
    $("#submit").click(function (event) {
      event.preventDefault();
      var dfname = $("#firstName").val();
      var dlname = $("#lastName").val();
      var contactNum = $("#phone_number").val();
      var starrating = selectedStar;
      selectedCompany = selectedCompany;
      var gender = $("input[name='gender']:checked").val();
      var carMake = $("#carMake").val();
      var carModel = $("#carModel").val();
      var carColor = $("#carColor").val();
      var plateNumber = $("#plateNumber").val();
      var reviewDescription = $("#ReviewDescription").val();
  
      // Form validation checks
      if (dfname == null || dfname.trim() === "") {
        alert("Driver First Name can't be blank");
        return false;
      }
      if (dlname == null || dlname.trim() === "") {
        alert("Driver Last Name can't be blank");
        return false;
      }
      if (contactNum == null || contactNum.trim() === "") {
        alert("Phone Number can't be blank");
        return false;
      }
      if (selectedCompany == null || selectedCompany.trim() === "") {
        alert("Selected Company can't be blank");
        return false;
      }
      if (gender == null || gender.trim() === "") {
        alert("Gender can't be blank");
        return false;
      }
      if (carMake == null || carMake.trim() === "") {
        alert("Car Make can't be blank");
        return false;
      }
      if (carModel == null || carModel.trim() === "") {
        alert("Car Model can't be blank");
        return false;
      }
      if (carColor == null || carColor.trim() === "") {
        alert("Car Color can't be blank");
        return false;
      }
      if (plateNumber == null || plateNumber.trim() === "") {
        alert("Car Plate Number can't be blank");
        return false;
      }
      if (reviewDescription == null || reviewDescription.trim() === "") {
        alert("Review Description can't be blank");
        return false;
      }
  
      // Submit review data via AJAX
      $.ajax({
        url: "../actions/reviewdriver_action.php",
        method: "post",
        data: JSON.stringify({
          dfname: dfname,
          dlname: dlname,
          contactNum: contactNum,
          gender: gender,
          rating: starrating,
          rhcomp: selectedCompany,
          carMake: carMake,
          carModel: carModel,
          carColor: carColor,
          plateNumber: plateNumber,
          reviewDescription: reviewDescription,
        }),
        dataType: "json",
        success: (data, status) => {
          console.log(data, status);
          if (data.status == 201) {

            window.location.href =
              "../view/driverdetails.php?did=" + data.driverId;
          }
        },
        error: (error) => {
          console.log(error);
          var responseData = JSON.stringify(error.responseText);
          document.getElementById("error").innerHTML = responseData.message;
        },
      });
    });
  });