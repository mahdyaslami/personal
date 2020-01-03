var calendar = {
    m: null,
    current: null,
    data: [],

    /**
     * مقدار دهی های اولیه را انجام می دهد
     */
    load() {
        /**
         * پراپرتی ها
         */
        moment.loadPersian({ dialect: 'persian-modern' });
        this.m = moment();
        this.current = document.getElementById('current');

        /**
         * رویداد ها
         */
        $('#calendar-days button').on('click', this.daysButtonsClick);
        $('#next').on('click', this.nextClick);
        $('#previous').on('click', this.previousClick);
        $('#go-today').on('click', this.goTodayClick);

        /**
         * بروز رسانی ها
         */
        this.receive(function(js) {
            this.data = js.data;
            this.updateAll();
        });
    },

    /**
     * یک تاریخ میلادی را که به صورت متن است ذخیره می کند
     * @param {a string contain gregorian data} strDate 
     */
    add(strDate) {
        this.data.push(strDate);
        this.send();
    },

    /**
     * یک اندیس می گیرد و آنرا از حذف می کند
     * @param {index of a date} index 
     */
    remove(index) {
        this.data.splice(index, 1);
        this.send();
    },

    /**
     * داده ها را برای ذخیره شده به سرور ارسال می کند
     */
    send() {
        let url = 'php/data/save.php';

        let data = new FormData();
        data.append('filename', 'm-time.json');
        data.append('data', JSON.stringify({ data: this.data }));

        fetch(url, {
            method: 'POST',
            body: data
        })
            .then(res => {
                return res.text();
            })
            .then(te => {
                //console.log(te);
                /**
                 * پاسخ
                 */
            });
    },

    /**
     * اطلاعات را از سرور دریافت می کند و به یک تابع ارسال می کند
     * @param {function with a json parameter} callback 
     */
    receive(callback) {
        let url = 'php/data/open.php';

        let data = new FormData();
        data.append('filename', 'm-time.json');

        fetch(url, {
            method: 'POST',
            body: data
        })
            .then(res => {
                // res.text().then(function(te) {
                //     console.log(te);
                // });
                return res.json();
            })
            .then(js => {
                if (callback) {
                    callback.call(this, js);
                }
            });
    },

    /**
     * هر عنصر تغییر پذیر در جدول را بروز می کند
     */
    updateAll() {
        this.updateDays();
        this.updateCurrent();
    },

    /**
     * تاریخ خانه ها را دوباره به روز می کند و استایل نمایش آنها را
     * مشخص می کند
     */
    updateDays() {
        /**
         * دریافت تاریخ امروز هم تاریخ و هم ماه
         */
        let today = moment();
        let currentMonth = today.month();
        
        /**
         * تنظیم یک مومنت برای نمایش ماه جاری
         */
        let d = moment(this.m);
        d.jDate(1);
        d.subtract(d.weekday(), 'day');

        document
            .querySelectorAll('#calendar-days button')
            .forEach(function(btn) {
                /**
                 * تاریخ مربوط به همان خانه را درونش ذخیره می کند - تاریخ میلادی
                 */
                let innerDate = d.format('YYYY-MM-DD');
                btn.setAttribute('inner-date', innerDate);
                btn.innerText = d.jDate();

                /**
                 * کلاس های مربوط به ماهیت روز را از خانه جاری حذف می کند تا
                 * یک روز معمولی باشد
                 */
                btn.classList.remove('today');
                btn.classList.remove('btn-light');
                btn.classList.remove('holiday');
                btn.classList.remove('selected');

                /**
                 * اگر خانه جاری امروز بود
                 */
                if (d.isSame(today, 'day')) {
                    btn.classList.add('today');
                }

                /**
                 * اگر خانه جاری جمعه بود
                 */
                if (d.weekday() == 6) {
                    btn.classList.add('btn-light');
                    btn.classList.add('holiday');
                }

                /**
                 * اگر خانه جاری از تاریخ های انتخاب شده بود
                 */
                if (calendar.data.indexOf(innerDate) > -1) {
                    btn.classList.add('selected');
                }
                
                d.add(1, 'day');
            });
    },

    /**
     * ماه جاری و سال جاری را بروز می کند
     */
    updateCurrent() {
        this.current.innerText = this.m.format('jYYYY jMMMM');
    },

    /**
     * ========================================================================
     * ========== EVENTS
     * ========================================================================
     */

     /**
      * روی هر خانه که زده شود این رویداد صدا زده می شود
      * و در صورتی که از تاریخ های انتخاب شده باشد آنرا حذف می کند
      * در غیر این صورت آنرا اضافه می کند
      * @param {Event object} ev 
      */
    daysButtonsClick(ev) {
        let btn = ev.target;
        let date = btn.getAttribute('inner-date');
        let index = calendar.data.indexOf(date);
        if (index > -1) {
            calendar.remove(index);
        } else {
            calendar.add(date);
        }
        calendar.updateAll();
    },

    /**
     * رویداد دکمه رفتن به ماه بعدی
     * @param {Event object} ev 
     */
    nextClick(ev) {
        calendar.m.add(1, 'month');
        calendar.updateAll();
    },

    /**
     * رویداد دکمه رفتن به ماه قبلی
     * @param {Event object} ev 
     */
    previousClick(ev) {
        calendar.m.subtract(1, 'month');
        calendar.updateAll();
    },

    /**
     * تقویم را به ماه جاری می آورد
     * @param {Event object} ev 
     */
    goTodayClick(ev) {
        calendar.m = moment();
        calendar.updateAll();
    }
};

$(document).ready(function() {
    calendar.load();
});
