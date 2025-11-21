$(document).ready(function () {

    fetchAllServices();

    // -------------------------------
    // FETCH ALL SERVICES
    // -------------------------------
    function fetchAllServices() {

        $.ajax({
            url: "ajaxFile/serviceAjax.php",
            method: "GET",
            data: {
                sFlag: "fetchAll",
                title: $("#filterServiceTitle").val(),
                category: $("#filterServiceCategory").val()
            },
            dataType: "json",
            success: function (res) {
                if (res.status === "success") {
                    renderServiceCards(res.data);
                } else {
                    responsePop("Error", res.message, "error", "ok");
                }
            }
        });
    }

    function renderServiceCards(services) {
        let container = $("#serviceContainer");
        container.empty();

        if (services.length === 0) {
            container.html(`<p class="text-center">No services found.</p>`);
            return;
        }

        services.forEach((service, index) => {
            let count = (index + 1).toString().padStart(2, "0");

            let card = `
        <div class="col-md-6 col-xl-4">
            <div class="service-card">
                <div class="service-card_number">${count}</div>

                <div class="shape-icon">
                    <img src="${service.service_image}" alt="Icon">
                    <span class="dots"></span>
                </div>

                <h3 class="box-title">
                    <a href="service-details.php?id=${service.id}">
                        ${service.service_title}
                    </a>
                </h3>

                <p class="service-card_text" style="text-align: justify;">
                    ${truncateText(stripHtml(service.service_description), 150)}
                </p>

                <a href="service-details.php?id=${service.id}" class="th-btn">
                    Read More <i class="fa-regular fa-arrow-right ms-2"></i>
                </a>

                <div class="bg-shape">
                    <img src="assets/img/bg/service_card_bg.png" alt="bg">
                </div>
            </div>
        </div>
        `;

            container.append(card);
        });
    }

    function stripHtml(html) {
        return $("<div>").html(html).text();
    }

    function truncateText(text, maxLength) {
        return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
    }





});

