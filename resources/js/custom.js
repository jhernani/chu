function show_profile() {
	document.getElementById('dashboardwrapper').style.display='none';
	document.getElementById('profilewrapper').style.display='block';
}

function show_dashboard() {
    document.getElementById('profilewrapper').style.display='none';
    document.getElementById('dashboard-logs').style.display='none';
    document.getElementById('settingswrapper').style.display='none';
    document.getElementById('dashboardwrapper').style.display='block';
    document.getElementById('dashboard-request').style.display='block';
}

function show_logs() {
	document.getElementById('dashboard-request').style.display='none';
	document.getElementById('settingswrapper').style.display='none';
	document.getElementById('dashboard-logs').style.display='block';
}

function show_request() {
    document.getElementById('dashboard-logs').style.display='none';
    document.getElementById('dashboard-request').style.display='block';
}

function show_settings() {
    document.getElementById('dashboard-logs').style.display='none';
    document.getElementById('dashboard-request').style.display='none';
    document.getElementById('settingswrapper').style.display='block';
}

function toggleFields() {
    if($(".leave-type-select").val() == 5) {
        $(".overtime-time-select").show();
    }else {
        $(".overtime-time-select").hide();
    }
}

/* OVERTIME */

$(document).ready(function () {
    toggleFields();
    $(".leave-type-select").change(function () {
        toggleFields();
    });
});

// -------------------------------------------------------------------

/* REQUEST DELETE TOOLTIP */

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

// -------------------------------------------------------------------

/* ADD COMMENT  */

    $(document).ready(function() {
        $(".add-comment").click(function() {
            $(".time-comment").show();
        });
    });

// -------------------------------------------------------------------

/* EDIT PERSONAL INFORMATION */
    $(document).ready(function() {
        $(".personal-information-hover").click(function(){
            $(".personal-information-edit").show();
        });
    });

// -------------------------------------------------------------------

/* CHANGE PASSWORD */

    $(document).ready(function() {
        $(".change-password-hover").click(function() {
            $(".change-password").show();
        });
    });

// -------------------------------------------------------------------