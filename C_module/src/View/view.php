<div class="fund-section">
            <div class="fund-section-title d-center mt-5 mb-2">펀드 보기</div>
            <div class="fund-section-subtitle d-center mb-5">펀드율에 따라 달라지는 마술!</div>
            <div class="fund-view-list container">
                <!-- <div class="item pointer">
                    <div class="item-number d-center ml-3 mb-4">A0003</div>
                    <div class="item-inner d-center">
                        <div class="img">
                            <img src="./resource/images/business.jpg" alt="">
                        </div>
                        <div class="item-content d-colum ml-5">
                            <p class="d-end">상세보기</p>
                            <div class="item-name mb-2">마감된 펀드4</div>
                            <p class="item-owner">abc@13.com</p>
                            <p class="item-date">endtDate : 2019-05-01 15:30:00</p>
                            <p class="item-price"> 35000 / 40000</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 82%;">82px;</div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="item pointer">
                    <div class="item-number d-center ml-3 mb-4">A0001</div>
                    <div class="item-inner d-center">
                        <div class="img">
                            <img src="./resource/images/invest2.jpg" alt="">
                        </div>
                        <div class="item-content d-colum ml-5">
                            <p class="d-end">상세보기</p>
                            <div class="item-name mb-2">마감된 펀드1</div>
                            <p class="item-owner">abc@13.com</p>
                            <p class="item-date">endtDate : 2021-05-01 15:30:00</p>
                            <p class="item-price"> 35000 / 40000</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%;">60px;</div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="item pointer">
                    <div class="item-number d-center ml-3 mb-4">A0003</div>
                    <div class="item-inner d-center">
                        <div class="img">
                            <img src="./resource/images/invest.jpg" alt="">
                        </div>
                        <div class="item-content d-colum ml-5">
                            <p class="d-end">상세보기</p>
                            <div class="item-name mb-2">마감된 펀드2</div>
                            <p class="item-owner">abc@13.com</p>
                            <p class="item-date">endtDate : 2019-05-01 15:30:00</p>
                            <p class="item-price"> 35000 / 40000</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 30%;">30px;</div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="item pointer">
                    <div class="item-number d-center ml-3 mb-4">A0003</div>
                    <div class="item-inner d-center">
                        <div class="img">
                            <img src="./resource/images/calc.jpg" alt="">
                        </div>
                        <div class="item-content d-colum ml-5">
                            <p class="d-end">상세보기</p>
                            <div class="item-name mb-2">마감된 펀드3</div>
                            <p class="item-owner">abc@13.com</p>
                            <p class="item-date">endtDate : 2019-05-01 15:30:00</p>
                            <p class="item-price"> 35000 / 40000</p>
                            <div class="progress">
                                <div class="progress-bar" style="width: 17%;">17px;</div>
                            </div>
                        </div>
                    </div> 
                </div> -->
            </div>
            <ul class="page-nation d-center mb-5">
                <li class="prev pointer">prev</li>
                <ul class="number-box ml-4 d-center">
                    <li class="number pointer">1</li>    
                    <li class="number pointer">2</li>  
                    <li class="number pointer">3</li>  
                    <li class="number pointer">4</li>  
                    <li class="number pointer">5</li>  
                    <li class="number pointer">6</li>  
                    <li class="number pointer">7</li>  
                    <li class="number pointer">8</li>  
                    <li class="number pointer">9</li>  
                    <li class="number pointer">10</li>  
                </ul>
                <li class="next ml-4 pointer">next</li>
            </ul>
        </div>
    </div>    
    <div id="invest-view-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body px-4 py-5">
                    <div class="title">상세보기</div>
                    <div class="mt-5">
                        <small class="text-gray">번호</small>
                        
                    </div>
                    <div class="mt-5">
                        <small class="text-gray">펀드명</small>
                        
                    </div>
                    <div class="mt-5">
                        <small class="text-gray">창업자명</small>
                        
                    </div>
                    <div class="mt-5">
                        <small class="text-gray">모집마감일</small>
                        
                    </div>
                    <div class="mt-5">
                        <small class="text-gray">투자자 리스트</small>
                        <div class="investor pt-1 pl-4" style="max-height: 450px; height: auto; overflow-y: scroll;">
                            <div>
                                <small class="text-gray">이메일</small>
                                
                            </div>
                            <div class="mt-2">
                                <small class="text-gray">투자금액</small>
                                
                            </div>
                            <div class="mt-2">
                                <small class="text-gray">투자시간</small>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="invest-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body px-4 py-5">
                    <form action="/insert/investor" method="post">
                        <div class="title">투자하기</div>
                        <div class="form-group">
                            <label for="invest_num">펀드번호</label>
                            <input type="text" name="fund_num" id="invest_num" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="invest_name">펀드이름</label>
                            <input type="text" name="fund_name" id="invest_name" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="invest_investor">투자자명</label>
                            <input type="text" name="user_name" id="invest_investor" class="form-control" value="홍길동" readonly>
                        </div>
                        <div class="form-group">
                            <label for="invest_price">투자금액</label>
                            <input type="number" name="fund_price" id="invest_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="invest-sign">서명란</label>
                                <select id="thick" class="form-control mb-2" aria-placeholder="두께를 선택하세요">
                                    <option value="1">1pt</option>
                                    <option value="3">3pt</option>
                                    <option value="5">5pt</option>
                                    <option value="7">7pt</option>
                                </select>
                            </div>
                            <canvas width="450" height="150" style="border: 1px solid #aaa"></canvas>
                            <input type="hidden" name="fund_sign" id="invest_sign">
                        </div>
                        <div class="form-group">
                            <button class=" blue-btn btn insert-btn w-50 d-center">투자</button>
                        </div>
                    </form>
                    <div class="form-group">
                        <button class="close-btn blue-btn btn close-btn w-50 d-center">취소</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="toast_container"></div>