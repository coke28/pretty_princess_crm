// PUBLIC CHANNEL  TEMPLATE
$(document).ready(function () {
    const channel = Echo.channel("public-form.1");
    channel
        .subscribed(() => {
            $.ajax({
                url: "/form/activeCount" ,
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    // Your success handling code here
                    data = JSON.parse(data);
                    updateFormCard(data.formActiveCount);
                },
                error: function (xhr, status, error) {
                    // This function will be called on AJAX failure
                    updateFormCard("AJAX Request Failed:", status, error);
                },
            });
            console.log("subscribed");
        })
        .listen("FormEvent", (event) => {
            console.log(event);
            updateFormCard(event.formActiveCount);
        });

    function updateFormCard(formCount) {
        $("#active-form-count").text(formCount);
    }
});
