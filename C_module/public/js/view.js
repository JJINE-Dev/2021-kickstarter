class App {
    constructor() {
        this.fund = document.querySelector(".fund-view-list");

        fetch("./resource/js/fund.json")
        .then(res => res.json())
        .then(data => this.init(data));
    }

    init(data) {
        this.data = data;
        this.data.forEach((item, i) => {
            item.idx = i;
            item.str_total = this.string(item.total);
            item.str_current = this.string(item.current);
            item.attain = (item.current / item.total) * 100;
        });
        this.data.forEach(item => this.addItem(item));
        this.loading();
    }

    string(item) {
        return item.toLocaleString("ko-KR");
    }

    addItem(item) {
        console.log(item);
        let div = document.createElement("div");
        div.innerHTML = `<div class="item">
                            <div class="item-number d-center ml-3 mb-4">${item.number}</div>
                            <div class="item-inner d-center">
                                <div class="img">
                                    <img src="./resource/images/calc.jpg" alt="">
                                </div>
                                <div class="item-content d-colum ml-5">
                                    <div class="item-name mb-2">${item.name}</div>
                                    <p class="item-owner">${item.owner}</p>
                                    <p class="item-date">${item.endDate}</p>
                                    <p class="item-price"> ${item.current} / ${item.total}</p>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated fs-n1" style="width: 100%;">${item.attain}%</div>
                                    </div>
                                    <div class="item-footer"></div>
                                </div>
                            </div> 
                        </div>`;
        this.fund.appendChild(div);
        
        if(new Date(this.data[item.idx].endDate) <= new Date()) {
            div.querySelector(".item-footer").innerHTML = `
            <button class="blue-btn btn pointer">????????????</button>
            <button class="detail-btn blue-btn btn pointer" data-toggle="modal" data-target="#invest-view-modal" data-id=${item.idx}>????????????</button>`;
        } else {
            div.querySelector(".item-footer").innerHTML = `
            <button class="invest-btn blue-btn btn" data-toggle="modal" data-target="#invest-modal" data-id=${item.idx}>????????????</button>
            <button class="detail-btn blue-btn btn" data-toggle="modal" data-target="#invest-view-modal" data-id=${item.idx}>????????????</button>`;
            div.querySelector(".invest-btn").addEventListener("click", e => { this.insetModal(e) })
        }
        div.querySelector(".detail-btn").addEventListener("click", e => { this.detailModal(e) })
    }

    insetModal(e) {
        let id = e.target.dataset.id;
        
        console.log(id, e.target.dataset.id);
        let num = document.querySelector("#invest_num");
        let name = document.querySelector("#invest_name");
        let price = document.querySelector("#invest_price");

        num.value = this.data[id].number;
        name.value = this.data[id].name;

        price.addEventListener("input", () => {
            if(price.value < 0) {
                price.setCustomValidity("???????????? ????????? ??? ????????????.");
                price.reportValidity();
            } else {
                price.setCustomValidity("");
                price.reportValidity();
            }
        })

        document.querySelector(".close-btn").addEventListener("click", e => {
            $("#invest-modal").modal("hide")
        })

        document.querySelector(".insert-btn").addEventListener("click", e => {
           if(price == "" || name == "" ||
            !name.checkValidity() || !price.checkValidity()) {
                this.showToast();
            } else location.href = "/index.html";
            
        })

        this.signation();
    }

    signation() {
        this.canvas = $("canvas");
        this.ctx = this.canvas[0].getContext("2d");
        this.ctx.clearRect(0, 0, 450, 150);
        this.flag = false;

        this.canvas[0].addEventListener("mousedown", (e) => {
            let thick = document.querySelector("#thick").value;
            this.ctx.lineWidth = thick;
            const { x, y } = this.getXY(e);
            this.ctx.beginPath();
            this.ctx.moveTo(x, y);
            this.flag = true;
        })
        this.canvas[0].addEventListener("mousemove", (e) => {
            if(this.flag) {
                const { x, y } = this.getXY(e);
                this.ctx.lineTo(x, y);
                this.ctx.stroke();
            }
        })
        this.canvas[0].addEventListener("mouseup", (e) => {
            if(this.flag) {
                const { x, y } = this.getXY(e);
                this.ctx.lineTo(x, y);
                this.ctx.stroke();
                this.flag = false;
            }
        })
    }

    getXY({pageX, pageY}) {
        let { left, top } = this.canvas.offset();
        let { width, height } = this.canvas[0];

        let x = pageX - left;
        x = x > width ? width : x < 0 ? 0 : x;
        
        let y = pageY - top;
        y = y > height ? height : y < 0 ? 0 : y;

        return { x:x, y:y }
    }

    detailModal(e) {
        let id = e.target.dataset.id;
        console.log(id);
        console.log(this.data[id]);
        let modal = document.querySelector("#invest-view-modal .modal-body");
        modal.innerHTML = ` <div class="title">????????????</div>
                                <div class="mt-2">
                                    <small class="text-gray">??????</small>
                                    <p class="ml-2 mb-3">${this.data[id].number}</p>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">?????????</small>
                                    <p class="ml-2 mb-3">${this.data[id].name}</p>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">????????????</small>
                                    <p class="ml-2 mb-3">${this.data[id].owner}</p>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">???????????????</small>
                                    <p class="ml-2 mb-3">${this.data[id].endDate}</p>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">????????? ?????????</small>
                                    <div class="investor pt-1 pl-4" style="max-height: 400px; height: auto; overflow-y: scroll;">
                                        
                                    </div>
                                </div>
                            </div>`;
        this.data[id].investorList.forEach(list => {
            let div = document.createElement("div");
            div.innerHTML = `   <div>
                                    <small class="text-gray">?????????</small>
                                    <span class="ml-2 mb-0">${list.email}</span>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">????????????</small>
                                    <span class="ml-2 mb-0">${list.pay}</span>
                                </div>
                                <div class="mt-2">
                                    <small class="text-gray">????????????</small>
                                    <span class="ml-2 mb-0">${list.datetime}</span>
                                </div>`;
            modal.querySelector(".investor").appendChild(div);
        })
    }

    loading() {
        setTimeout(() => {
            let progress = document.querySelectorAll(".progress-bar");
            progress.forEach((bar, i) => {
                bar.classList.remove("progress-bar-striped");
                bar.classList.remove("progress-bar-animated");
                bar.style.transition = `${this.data[i].attain / 50}s`;
                bar.style.width = `${this.data[i].attain}%`;
                bar.innerHTML = `${this.data[i].attain}%`;
            })
        }, 3000);
    }

    showToast() {
        let id = new Date().getTime();
        let toast = `<div class="toast" id=${id}>
                        <div class="toast-header d-between">
                            <strong>form ??????</strong>
                            <button class="close">x</button>
                        </div>
                        <div class="toast-body">
                            ???????????? ????????? ????????? ???????????? ????????????.
                        </div>
                    </div>`;
        $("#toast_container").append(toast);
        $(`#${id}`).toast({
            autohide: true,
            delay: 3000
        });
        $(`#${id} button`).on("click", function() {
            $(`#${id}`).remove();
        });
        $(`#${id}`).toast("show");
    }
}

window.onload = function() {
    let app = new App();
}