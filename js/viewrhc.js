
document.addEventListener("DOMContentLoaded", function () {
    $.ajax({
        url: "../actions/viewrhc_action.php",
        method: "get",
        dataType: "json",
        success: (data, status) => {
            console.log(data, status);
            if (data.status == 200) {
                response = data;
                let result = "";

                response.data.forEach((element) => {
                    result += "<tr>";
                    result += "<td class='rhcname'>" + element.company_name + "</td>";
                    result += "<td class='location'>" + element.location + "</td>";
                    result += "<td class='contactnum'>" + element.contact_number + "</td>";
                    result += "<td class='email'>" + element.email + "</td>";
                    result += "<td><button class='btn btn-danger delete-btn' onclick='confirmDelete(" + element.comid + ")'>Delete</button></td>";
                    result += "</tr>";
                });

                document.getElementById("display_rhc_data").innerHTML = result;
            }
        },
        error: (error) => {
            var responseData = JSON.parse(error.responseText);
            document.getElementById("error").innerHTML = responseData.message;
        },
    });
});

//Deleting a Ride-Hailing Company
function confirmDelete(comid) {
    if (confirm("Are you sure you want to delete this company?")) {
        $.ajax({
            url: "../actions/deletecompany_action.php",
            method: "post",
            data: JSON.stringify({
                comid: comid
            }),
            dataType: "json",
            success: function(data) {
                if (data.status == 201) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert("Error: " + data.message);
                }
            },
            error: function(xhr, status, error) {
                alert("Error: " + error);
            }
        });
    }
}