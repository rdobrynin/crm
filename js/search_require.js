define(function () {
    $(function () {
        /**
         * Live search in dashboard page over tasks
         */

        $("#search-dash-over-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#dash-over-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });


        $("#search-assign-users").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($(".assign-users-jsscroll").find("li"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in dashboard page process tasks
         */

        $("#search-dash-process-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#dash-process-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });


        /**
         * Live search in dashboard page process tasks
         */

        $("#search-all-comments").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#table-all-comments tbody").find("tr"), function() {
//            console.log($(this).text());
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search logs
         */

        $("#search-logs-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#log-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in dashboard page approve tasks
         */

        $("#search-dash-approve-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#approve-task-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });


        /**
         * Live search in sidebar user blocks
         */

        $("#search-sidebar-users").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($(".user-float-block"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in activity stream
         */

        $("#search-dash-comment").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($(".search-filter-comment"), function() {
//            console.log($(this).text());
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in task page process table
         */

        $("#search-task-process-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#table-task-process tbody").find("tr"), function() {

                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });


        /**
         * Live search in task page common table
         */

        $("#search-task-common-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#common-tasks-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in project page common tasks
         */

        $("#search-project-task-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($(".table-task tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
        /**
         * Live search in task page complete table
         */

        $("#search-task-complete-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#table-task-complete tbody").find("tr"), function() {
//            console.log($(this).text());
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });

        /**
         * Live search in dashboard page ready tasks
         */

        $("#search-dash-ready-table").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#ready-task-table tbody").find("tr"), function() {
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    });
});