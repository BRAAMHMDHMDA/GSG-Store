require('./bootstrap');

require('alpinejs');

// window.Echo.private('orders')
//     .listen('OrderCreated', function (event){
//         alert(`'New Order Created' #${event.order.number}`)
//     })

window.Echo.private(`App.Models.User.${userId}`)
    .notification(function (e){

        var count = Number($('#unread').text());
        count++;
        $('.unread').text(count);

        $('.notifications').prepend(`<a class="d-flex" href="/admin/notifications/${e.id}">
                        <div class="media d-flex align-items-start">
                            <div class="media-left">
                                <div class="avatar">
                                    <img src="${ e.icon }" alt="icon" width="32" height="32">
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="media-heading">
                                    <b style="color: red">*</b>
                                    ${e.title}
                                </p>
                                <small class="notification-text">
                                    ${e.body}
                                    <span class="float-right text-muted text-sm">
                                        ${ e.time }
                                    </span>
                                </small>
                            </div>
                        </div>
                    </a>`);


        toastr['info'](
            `<small class="notification-text">${e.body}</small>`,
            `<h5>${e.title}</h5>`,
            {
                positionClass:"toast-bottom-left",
                closeButton: true,
                tapToDismiss: false,
                showMethod:"fadeIn",
                hideMethod:"fadeOut",
                timeOut:50000,
            }
        );
        setTimeout(function () {
        }, 1000);
    })
