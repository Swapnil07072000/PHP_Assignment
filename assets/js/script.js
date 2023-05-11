$(document).ready(function(){
    let fError = false, lError = false, eError = false;
    //ID
    $('#student_id').blur(function(){
        let id = $('#student_id').val();
        if(id != "") {
            $('#idError').html('');
            $('#student_id').removeClass('errorBox');
        }
    })
    //First Name
    $('#student_first_name').keyup(function(){
        let fname = $('#student_first_name').val();
        if(!(/^[a-zA-Z]+$/).test(fname) && (fname != "")) {
            $('#fnameError').html("Alphabets only allowed")
            fError = true;
        }else {
            $('#fnameError').html('');
            $('#student_first_name').removeClass('errorBox');
            fError = false;
        }
    })
    //Last Name
    $('#student_last_name').keyup(function(){
        let lname = $('#student_last_name').val();
        if(!(/^[a-zA-Z]+$/).test(lname) && (lname != "")) {
            $('#lnameError').html("Alphabets only allowed");
            lError = true;
        }else {
            $('#lnameError').html('');
            $('#student_last_name').removeClass('errorBox');
            lError = false;
        }
    })
    //Email
    // /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
    $('#student_email_id').keyup(function(){
        let emailID = $('#student_email_id').val();
        if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(emailID) 
        && (emailID != "")) {
            $('#emailIDError').html("Please enter valid Email")
            $('#student_email_id').addClass('errorBox');
            eError = true;
        }else {
            $('#emailIDError').html('');
            $('#student_email_id').removeClass('errorBox');
            eError = false;
        }
    })

    //Marks Validation
    $('#englishMarks').blur(function(){
        let marks = $('#englishMarks').val();
        if(marks == "") {
            $('#englishError').html("Please fill-in marks");
            $('#englishError').addClass('errorBox');
        }else {
            $('#englishError').html("");
            $('#englishError').removeClass('errorBox');
        }

    }) 
    $('#hindiMarks').blur(function(){
        let marks = $('#hindiMarks').val();
        if(marks == "") {
            $('#hindiError').html("Please fill-in marks");
            $('#hindiMarks').addClass('errorBox');
        }else {
            $('#hindiError').html("");
            $('#hindiMarks').removeClass('errorBox');
        }
    }) 
    $('#mathsMarks').blur(function(){
        let marks = $('#mathsMarks').val();
        if(marks == "") {
            $('#mathsError').html("Please fill-in marks");
            $('#mathsMarks').addClass('errorBox');
        }else {
            $('#mathsError').html("");
            $('#mathsMarks').removeClass('errorBox');
        }
    }) 
    $('#scienceMarks').blur(function(){
        let marks = $('#scienceMarks').val();
        if(marks == "") {
            $('#scienceError').html("Please fill-in marks");
            $('#scienceMarks').addClass('errorBox');
        }else {
            $('#scienceError').html("");
            $('#scienceMarks').removeClass('errorBox');
        }
    }) 
    $('#historyMarks').blur(function(){
        let marks = $('#historyMarks').val();
        if(marks == "") {
            $('#historyError').html("Please fill-in marks");
            $('#historyMarks').addClass('errorBox');
        }else {
            $('#historyError').html("");
            $('#historyMarks').removeClass('errorBox');
        }
    }) 
    $('#geographyMarks').blur(function(){
        let marks = $('#geographyMarks').val();
        if(marks == "") {
            $('#geographyError').html("Please fill-in marks");
            $('#geographyMarks').addClass('errorBox');
        }else {
            $('#geographyError').html("");
            $('#geographyMarks').removeClass('errorBox');
        }
    })

    //Form Submit
    $('#reportForm').submit(function(e) {
        let id = $('#student_id').val();
        let fname = $('#student_first_name').val();
        let lname = $('#student_last_name').val();
        let bname = $('#student_class_name').val();
        let email = $('#student_email_id').val();
        let engMarks = $('#englishMarks').val();
        let hindiMarks = $('#hindiMarks').val();
        let mathsMarks = $('#mathsMarks').val();
        let scienceMarks = $('#scienceMarks').val();
        let historyMarks = $('#historyMarks').val();
        let geographyMarks = $('#geographyMarks').val();
        let remark = $('#remarkArea').val();
        if(!areAnyFieldsEmpty(
            id, fname, lname,
            engMarks, hindiMarks, mathsMarks, 
            scienceMarks, historyMarks, geographyMarks
            )
        ){
            if(!fError && !lError) { //First and Last name have alphabets only
                //Marks should not be greater than 100
                if(!areMarksGreaterThan(id,
                    engMarks, hindiMarks, mathsMarks, 
                    scienceMarks, historyMarks, geographyMarks
                )
                ) {
                    if((email != "") && (!eError)) {
                        console.log("With valid email");    
                    }
                    if(email == "") email = "None";
                    if(bname == "") bname = "None";
                    if(remark == "") remark = "None";
                    let data = {
                        "id" : id,
                        "fname": fname,
                        "lname": lname,
                        "bname": bname,
                        "email": email,
                        "engM": engMarks,
                        "hinM": hindiMarks,
                        "mathsM": mathsMarks,
                        "scienceM": scienceMarks,
                        "hisM": historyMarks,
                        "geoM": geographyMarks,
                        "remark": remark,
                    }
                    Cookies(data); 
                    return true;
                }
            }
        }
        return false;
    })

    $('#displayPage #backBtn').click(function() {
        var allCookies = document.cookie.split(';');
        console.log(allCookies);
        for (var i = 0; i < allCookies.length; i++) {
            document.cookie = allCookies[i] + "=;expires="+ new Date(0).toUTCString();
        }
        window.location.href = "reportForm.php";
    })
})

function Cookies(data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: "backend.php",
            type: 'POST',
            data: data,
            success: function (data) {
              resolve(data)
            },
            error: function (error) {
              reject(error)
            },
          })
    })
}

function areAnyFieldsEmpty(id, fname, lname, engMarks,
    hindiMarks, mathsMarks, scienceMarks, historyMarks, geographyMarks) {
    let res = false;
    if(id == ""){
        $('#idError').html("Please fill student ID");
        $('#student_id').addClass('errorBox');
        res = true;
    }
    if(fname == "") {
        $('#fnameError').html("Please fill First Name");
        $('#student_first_name').addClass('errorBox');
        res = true;
    }
    if(lname == "") {
        $('#lnameError').html("Please fill Last Name");
        $('#student_last_name').addClass('errorBox');
        res = true;
    }
    if(engMarks == ""){
        $('#englishError').html("Please fill-in marks");
        $('#englishMarks').addClass('errorBox');
        res = true;
    }
    if(hindiMarks == ""){
        $('#hindiError').html("Please fill-in marks");
        $('#hindiMarks').addClass('errorBox');
        res = true;
    }
    if(mathsMarks == ""){
        $('#mathsError').html("Please fill-in marks");
        $('#mathsMarks').addClass('errorBox');
        res = true;
    }
    if(scienceMarks == ""){
        $('#scienceError').html("Please fill-in marks");
        $('#scienceMarks').addClass('errorBox');
        res = true;
    }
    if(historyMarks == ""){
        $('#historyError').html("Please fill-in marks");
        $('#historyMarks').addClass('errorBox');
        res = true;
    }
    if(geographyMarks == ""){
        $('#geographyError').html("Please fill-in marks");
        $('#geographyMarks').addClass('errorBox');
        res = true;
    }
    return res;
}
function areMarksGreaterThan(id, engMarks, hindiMarks, mathsMarks, 
    scienceMarks, historyMarks, geographyMarks) {
    let res = false;
    if((id < 0) && (id != 0)) {
        $('#idError').html("ID should be non-negative");
        $('#student_id').addClass('errorBox');
        res = true;
    }
    if(engMarks > 100 || engMarks < 0){
        $('#englishError').html("Marks can be 0-100");
        $('#englishMarks').addClass('errorBox');
        res = true;
    }
    if(hindiMarks > 100 || hindiMarks < 0){
        $('#hindiError').html("Marks can be 0-100");
        $('#hindiMarks').addClass('errorBox');
        res = true;
    }
    if(mathsMarks > 100 || mathsMarks < 0){
        $('#mathsError').html("Marks can be 0-100");
        $('#mathsMarks').addClass('errorBox');
        res = true;
    }
    if(scienceMarks > 100 || scienceMarks < 0){
        $('#scienceError').html("Marks can be 0-100");
        $('#scienceMarks').addClass('errorBox');
        res = true;
    }
    if(historyMarks > 100 || historyMarks < 0){
        $('#historyError').html("Marks can be 0-100");
        $('#historyMarks').addClass('errorBox');
        res = true;
    }
    if(geographyMarks > 100 || geographyMarks < 0){
        $('#geographyError').html("Marks can be 0-100");
        $('#geographyMarks').addClass('errorBox');
        res = true;
    }
    return res;
}