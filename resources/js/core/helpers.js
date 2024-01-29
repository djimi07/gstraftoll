const $ = window.$;

const APP_ADDRESS = window.APP_ADDRESS = window.location.origin + '/';

let modalDefaultFooter = null;
window.addEventListener('load', () => {
    modalDefaultFooter = $('#modal_general .modal-footer').html();
});

class GsTraftoll {
    static url(url = '') {
        return APP_ADDRESS + url;
    }

    static apiUrl(url = '') {
        return `${APP_ADDRESS}api/${url}`;
    }

    static base64_encode(string) {
        return btoa(string);
        // return Buffer.from(string).toString('base64');
    }

    static base64_decode(string) {
        return atob(string);
        // return Buffer.from(string, 'base64').toString('ascii');
    }

    static formatNumber(number) {
        return Intl.NumberFormat().format(number);
    }

    static formatMoneyAmount(number) {
        return new Intl.NumberFormat(`en-NG`, {
            currency: `NGN`,
            style: 'currency',
        }).format(number)
    }

    static formatMoneyAmountDisplay(num) {
        if (num === null) return 0;

        num = num.toString().replace(/[^0-9.]/g, '');
        if (num < 1000) {
            return num;
        }
        let si = [
            {v: 1E3, s: "K"},
            {v: 1E6, s: "M"},
            {v: 1E9, s: "B"},
            {v: 1E12, s: "T"},
            {v: 1E15, s: "P"},
            {v: 1E18, s: "E"}
        ];
        let index;
        for (index = si.length - 1; index > 0; index--) {
            if (num >= si[index].v) {
                break;
            }
        }
        return (num / si[index].v).toFixed(2).replace(/\.0+$|(\.[0-9]*[1-9])0+$/, "$1") + si[index].s;
    }

    static initDataTable(tableId, dSettings) {
        console.log(tableId);
        console.log(dSettings);
        const ajax = dSettings.ajax;

        // Add bearer token
        const constructedAjaxData = {

            url: dSettings.ajax,
            data: {},
            beforeSend: function (request) {
                request.setRequestHeader('Authorization', `Bearer ${API_TOKEN}`)
                request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'))
            },
            error(xhr) {
                if (xhr.status === 401) {
                    Swal.fire({
                        title: 'Authentication',
                        html: 'Your session has expired, please login again!',
                        icon: 'warning'
                    }).then(() => window.location.href = '/login')
                }
            }
        }

        if ('object' === typeof ajax) {
            constructedAjaxData.url = ajax.url
            constructedAjaxData.data = ajax.data
        }

        dSettings.ajax = constructedAjaxData;
        dSettings.processing = true;
        dSettings.serverSide = true;
        dSettings.lengthMenu = [5, 10, 15, 20, 30, 40, 50];
        dSettings.stateSave = true;

        if (!dSettings.hasOwnProperty('pageLength')) {
            dSettings.pageLength = 10;
        }

        // @ts-ignore
        const $table = $(tableId).DataTable(dSettings)

        $table.on('draw', () => console.log('Table Drawn'));

        return $table;
    }


    static isMobilePhone(str) {

        // var isphone = /^(1\s|1|)?((\(\d{3}\))|\d{3})(\-|\s)?(\d{3})(\-|\s)?(\d{4})$/.test(str);
        // let isphone= /^0([89][01]|70)\d{8}$/.test(str);
        let isphone= /^0([789][01])\d{8}$/.test(str);
        // alert(isphone);
        return isphone;
    }
}

window.GsTraftoll = GsTraftoll
