var currentPage = 1;
var csrfToken = $("meta[name='csrf-token']").attr("content");

$(document).ready(function () {
    $(document).on("input", "#buy", function (event) {
        event.preventDefault();
        var total = Number($(this).val());
        var sell = total + total * 0.3;

        $("#sell").val(sell);
    });

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        var search = $("#search").val();
        var category = $("#category").val();

        currentPage = page;

        fetchUserData(page, search, category);
    });

    $(document).on("change", "#search", function (event) {
        event.preventDefault();
        var page = currentPage;
        var search = $("#search").val();
        var category = $("#category").val();

        fetchUserData(page, search, category);
    });

    $(document).on("change", "#category", function (event) {
        event.preventDefault();
        var page = currentPage;
        var search = $("#search").val();
        var category = $("#category").val();

        fetchUserData(page, search, category);
    });

    $(document).on("click", "#delete", function (event) {
        event.preventDefault();
        var id = $(this).data("value");

        sendData("/produk/destroy/" + id, "DELETE");
    });

    function sendData(url, method) {
        $.ajax({
            url: url,
            method: method,
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
            success: function (data) {
                alert("SUCCESS");

                var search = $("#search").val();
                var category = $("#category").val();
                fetchUserData(currentPage, search, category);
            },
        });
    }

    function fetchUserData(page, search, category) {
        $.ajax({
            url:
                "/produk/data?page=" +
                page +
                "&search=" +
                search +
                "&kategori_id=" +
                category,
            success: function (data) {
                $("#produk-data").html(data);
            },
        });
    }

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var htmlPreview =
                    '<img width="200" src="' +
                    e.target.result +
                    '" />' +
                    "<p>" +
                    input.files[0].name +
                    "</p>";
                var wrapperZone = $(input).parent();
                var previewZone = $(input)
                    .parent()
                    .parent()
                    .find(".preview-zone");
                var boxZone = $(input)
                    .parent()
                    .parent()
                    .find(".preview-zone")
                    .find(".box")
                    .find(".box-body");

                wrapperZone.removeClass("dragover");
                previewZone.removeClass("hidden");
                boxZone.empty();
                boxZone.append(htmlPreview);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset(e) {
        e.wrap("<form>").closest("form").get(0).reset();
        e.unwrap();
    }

    $(".dropzone").change(function () {
        readFile(this);
    });

    $(".dropzone-wrapper").on("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass("dragover");
    });

    $(".dropzone-wrapper").on("dragleave", function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass("dragover");
    });

    $(".remove-preview").on("click", function () {
        var boxZone = $(this).parents(".preview-zone").find(".box-body");
        var previewZone = $(this).parents(".preview-zone");
        var dropzone = $(this).parents(".form-group").find(".dropzone");
        boxZone.empty();
        previewZone.addClass("hidden");
        reset(dropzone);
    });
});
