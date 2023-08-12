const hostname = window.location.hostname;
if (hostname != undefined && hostname != '') {
    const fromWeb = hostname.split('.')[0];

    class Render {
        constructor() {
            this.appendTemplate(fromWeb);
            this.tawkChatInputEditor = $('#tawk-chatinput-editor');
            this.tawkChatinputAddFile = $('#tawk-chatinput-addFile');
            this.listConversation = $('.listConversation');
            this.liveChatMain = $('.liveChatMain');
            this.listFile = [];
            this.baseurlFileUpload = "https://mess.timviec365.vn/uploads/";
        }

        getClientCodeID() {
            // Check thiết bị truy cập
            var uuid = function() {
                var u = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g,
                    function(c) {
                        var r = Math.random() * 16 | 0,
                            v = c == 'x' ? r : (r & 0x3 | 0x8);
                        return v.toString(16);
                    });
                return u;
            }

            var getDeviceId = function() {
                var current = window.localStorage.getItem("_DEVICEID_")
                if (current) return current;
                var id = uuid();
                window.localStorage.setItem("_DEVICEID_", id);
                return id;
            }
            return getDeviceId();
        }

        getConversationGroupID() {
            // Nhóm chung
            return 99144;
        }

        talk_button() {
            return `<button class="talk_button">Trực tuyến</button>`;
        }

        liveChatHeader() {
            return `<div class="liveChatHeader">
                        <div class="liveChatHeaderButton"><button id="liveChatClose">X</button></div>
                        <div class="text-center text">
                            <a rel="nofollow" download href="${$(window).width()<1024?"https://onelink.to/kmybdy":"/dowload/livechat/chat.exe"}" class="text">Bạn tải CHAT365 <span class="underLine">tại đây</span> để nhận được sự hỗ trợ tốt nhất, <span class="underLine">tải ngay</span></a>
                        </div>
                    </div>`;
        }

        liveChatBody() {
            return `<div class="liveChatBody">
                        <div class="listConversation"></div>
                        <div id="typing"></div>
                        <div id="mainEnterChat">
                            <div id="boxPreview" class="hidden"><button class="itemPreview" id="itemAddNewFile"><img src="/images/livechat/add_new_file.svg"></button></div>
                            <div id="boxEnterChat">
                                <div id="boxEditor">
                                    <div id="boxRepMess">
                                        <div id="boxRepMessTop">
                                            <img src="/images/livechat/repMess.svg">
                                            <div id="boxContentRepMess">
                                                <p id="contentRepMess"></p>
                                                <p id="timeRepMess"></p>
                                            </div>
                                            <button id="closeRepMess">X</button>
                                        </div>
                                    </div>
                                    <textarea disabled placeholder="Nhập nội dung" id="tawk-chatinput-editor" rows="1"></textarea>
                                </div>
                                <div id="chatinputActionButtons">
                                    <button id="btnSendMess" class="hidden">${this.btnSendMessage()}</button>
                                    <button id="addFile">${this.btnSendFile()}</button>
                                    <input type="file" id="tawk-chatinput-addFile" multiple hidden>
                                </div>
                            </div>
                        </div>
                        <button id="onBotLiveChat"><img src="/images/livechat/onBottom.svg"></button>
                    </div>`;
        }

        drag() {
            return `<div id="drag"><img src="/images/livechat/drag.png"></div>`;
        }

        btnSendMessage() {
            return `<svg width="50" height="51" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_571_56690)"><path d="M30 7.4273V23.5726C30 27.3987 26.8987 30.5 23.0727 30.5H6.92736C3.10131 30.5 0 27.3987 0 23.5727V7.4273C0 3.60131 3.10131 0.5 6.92736 0.5H23.0727C26.8987 0.5 30 3.60131 30 7.4273Z" fill="url(#paint0_linear_571_56690)"/><path d="M6.79923 30.5C3.05012 30.5 0 27.4499 0 23.7008V7.29923C0 3.55012 3.05012 0.5 6.79923 0.5H23.2008C26.9499 0.5 30 3.55012 30 7.29923V23.7008C30 27.4499 26.9499 30.5 23.2008 30.5H6.79923Z" fill="url(#paint1_linear_571_56690)"/><path opacity="0.5" d="M30.0001 15.4666V23.5725C30.0001 27.3986 26.8987 30.5 23.0726 30.5H16.8868L8.66577 22.279L23.4435 8.90997L30.0001 15.4666Z" fill="url(#paint2_linear_571_56690)"/><path opacity="0.3" d="M23.7208 9.24756L5.73975 13.7902L8.95742 16.8186V22.5914L12.1258 20.1762L15.2035 23.2539L23.7208 9.24756Z" fill="#1A1A1A"/><path d="M23.4085 8.93506L10.2539 18.3042L14.8911 22.9414L23.4085 8.93506Z" fill="url(#paint3_linear_571_56690)"/><path d="M8.64502 16.5061V22.279L10.2539 18.3042L23.4085 8.93506L8.64502 16.5061Z" fill="url(#paint4_linear_571_56690)"/><path d="M5.42725 13.4777L8.64492 16.5061L23.4084 8.93506L5.42725 13.4777Z" fill="url(#paint5_linear_571_56690)"/><path d="M8.64502 22.279L11.8134 19.8638L10.2539 18.3042L8.64502 22.279Z" fill="#D2D2D2"/><path d="M23.4085 8.93506L10.2539 18.3042L14.8911 22.9414L23.4085 8.93506Z" fill="white"/><path d="M8.64502 16.5061V22.279L10.2539 18.3042L23.4085 8.93506L8.64502 16.5061Z" fill="#9FB5DF"/><path d="M5.42725 13.4777L8.64492 16.5061L23.4084 8.93506L5.42725 13.4777Z" fill="white"/></g><defs><linearGradient id="paint0_linear_571_56690" x1="15" y1="0.5" x2="15" y2="30.5" gradientUnits="userSpaceOnUse"><stop offset="0.005" stop-color="#FFE5AE"/><stop offset="1" stop-color="#FF992D"/></linearGradient><linearGradient id="paint1_linear_571_56690" x1="15" y1="0.792976" x2="15" y2="30.678" gradientUnits="userSpaceOnUse"><stop stop-color="#4C5BD4"/><stop offset="1" stop-color="#1F7ED0"/></linearGradient><linearGradient id="paint2_linear_571_56690" x1="15.9939" y1="15.5339" x2="28.7275" y2="28.267" gradientUnits="userSpaceOnUse"><stop stop-color="#64A8E2"/><stop offset="1" stop-color="#1F7ED0" stop-opacity="0"/></linearGradient><linearGradient id="paint3_linear_571_56690" x1="10.2539" y1="15.9382" x2="23.4085" y2="15.9382" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#F3E0DF"/><stop offset="1" stop-color="#E8E0BA"/></linearGradient><linearGradient id="paint4_linear_571_56690" x1="14.2217" y1="12.9556" x2="15.4627" y2="14.7785" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#65BCC0"/><stop offset="1" stop-color="#53838A"/></linearGradient><linearGradient id="paint5_linear_571_56690" x1="5.42725" y1="12.7206" x2="23.4084" y2="12.7206" gradientUnits="userSpaceOnUse"><stop offset="0.009" stop-color="#F3E0DF"/><stop offset="1" stop-color="#E8E0BA"/></linearGradient><clipPath id="clip0_571_56690"><rect y="0.5" width="30" height="30" rx="15" fill="white"/></clipPath></defs></svg>`;
        }

        btnSendFile() {
            return `<svg width="32" height="38" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.0371 7.45508L14.7324 1.15039C14.5566 0.974609 14.3193 0.875 14.0703 0.875H1.625C1.10645 0.875 0.6875 1.29395 0.6875 1.8125V26.1875C0.6875 26.7061 1.10645 27.125 1.625 27.125H20.375C20.8936 27.125 21.3125 26.7061 21.3125 26.1875V8.12012C21.3125 7.87109 21.2129 7.63086 21.0371 7.45508ZM19.1504 8.55078H13.6367V3.03711L19.1504 8.55078ZM19.2031 25.0156H2.79688V2.98438H11.6445V9.3125C11.6445 9.63884 11.7742 9.95182 12.0049 10.1826C12.2357 10.4133 12.5487 10.543 12.875 10.543H19.2031V25.0156ZM11.9375 12.8281C11.9375 12.6992 11.832 12.5938 11.7031 12.5938H10.2969C10.168 12.5938 10.0625 12.6992 10.0625 12.8281V15.9922H6.89844C6.76953 15.9922 6.66406 16.0977 6.66406 16.2266V17.6328C6.66406 17.7617 6.76953 17.8672 6.89844 17.8672H10.0625V21.0312C10.0625 21.1602 10.168 21.2656 10.2969 21.2656H11.7031C11.832 21.2656 11.9375 21.1602 11.9375 21.0312V17.8672H15.1016C15.2305 17.8672 15.3359 17.7617 15.3359 17.6328V16.2266C15.3359 16.0977 15.2305 15.9922 15.1016 15.9922H11.9375V12.8281Z" fill="#474747"/></svg>`;
        }

        appendTemplate(fromWeb) {
            const template = `<link rel="stylesheet" href="/css/livechat/app.css" media="all"><div id="liveChatContainer"><div class="widget ${fromWeb}">${this.talk_button()}<div class="liveChatMain" style="display: none">${this.liveChatHeader()}${this.liveChatBody()}${this.drag()}</div></div><audio controls id="notificationAudio" style="display: none;"></div>`;
            $('body').append(template);
        }

        changeBody(status) {
            if (status == 'show') {
                $('.talk_button').hide();
                this.liveChatMain.show();
                $('.widget').addClass('active');

                this.listConversation.animate({ scrollTop: this.listConversation.get(0).scrollHeight }, 0);
            } else {
                $('.talk_button').show();
                this.liveChatMain.hide();
                $('.widget').removeClass('active');
            }
        }

        showBtnSendMessage() {
            $('#btnSendMess').removeClass('hidden');
            $('#addFile').addClass('hidden');
        }

        checkShowMessTime(msg, prevMess) {
            const currentTimeMess = this.processTime(msg.createAt),
                currentTimeMessDay = currentTimeMess.day,
                prevTimeMess = this.processTime(prevMess.createAt);
            if (msg.senderID != prevMess.senderID || prevMess.messageType == 'notification' || (msg.senderID == prevMess.senderID && currentTimeMess.minutes != prevTimeMess.minutes)) {
                return true;
            }
            return false;
        }

        loadListMess(listMessages, inforSeen) {
            let resultListMess = '';
            const timeNow = this.processTime();

            for (let i = listMessages.length - 1; i >= 0; i--) {
                let msg = listMessages[i],
                    notificationDate = '',
                    showTime = false;
                if (msg.messageType != 'notification') {

                    // Thêm mới vào mảng danh sách tin nhắn
                    liveChat.listMessages.unshift(msg);

                    // So sánh thời gian giữa 2 tin nhắn
                    const currentTimeMess = this.processTime(msg.createAt),
                        currentTimeMessDay = currentTimeMess.day;
                    if (i > 0) {
                        const prevMess = listMessages[i - 1];
                        showTime = this.checkShowMessTime(msg, prevMess);
                    } else {
                        if (currentTimeMessDay == timeNow.day) {
                            showTime = true;
                            $('.notificationDate.today').remove();
                            notificationDate = this.notificationDate('Hôm nay', 'today');
                        } else {
                            console.log(currentTimeMessDay, timeNow.day);
                        }
                    }
                    // render tin nhắn
                    let mess = render.message(msg, showTime);

                    // Check hiển thị trạng thái đã xem
                    if (msg.messageID == inforSeen.lastMess && msg.senderID != socketLiveChat.userID) {
                        let getTimeSeen = this.getTime(inforSeen.time, "seenMessage"),
                            userSeen = this.userSeen(inforSeen.userName, inforSeen.userAvatar, getTimeSeen);
                        mess = mess + userSeen;
                    }

                    // Hiển thị thông báo ngày tháng
                    mess = notificationDate + mess;

                    resultListMess = mess + resultListMess;
                }
            }
            render.addMessToList(resultListMess);
        }

        messByUser(message, time, messageType = 'text', messageID, ListFile = [], InfoLink = null, quoteMessage = "", emotionMessage = [], showTime) {
            let liveChatItem;
            const liveChatTime = showTime ? this.getTime(time) : "",
                listReaction = this.getListReaction(),
                listReactedMess = this.getListReactedMess(emotionMessage),
                liveChatTimeDetail = this.getTime(time, "timeMessDetail");

            if (messageType == 'text') {
                liveChatItem = `<div class="liveChatItem user ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}" data-time="${time}">
                                    <div class="liveChatTime">${liveChatTime}</div>
                                    <div class="boxChatContent">
                                        <div class="liveChatContent liveChatContext">
                                            <div class="liveChatContentText">
                                                ${message.replaceAll('\n','<br>')}
                                            </div>
                                            <div class="detailTime"><span>${liveChatTimeDetail}</span></div>
                                            ${listReactedMess}
                                        </div>
                                        ${listReaction}
                                    </div>
                                </div>`;
            }
            if (messageType == 'sendPhoto' && ListFile != null) {
                liveChatItem = `<div class="liveChatItem user ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}">
                                    <div class="liveChatTime">${liveChatTime}</div>
                                    <div class="boxChatContent">
                                        <div class="liveChatContent liveChatContext image">`;
                ListFile.forEach(image => {
                    var imageFullName = image.fullName != undefined ? image.fullName : image.FullName;
                    liveChatItem += `<a href="${this.baseurlFileUpload}${imageFullName}" target="_blank" rel="nofollow">
                                        <img src="${this.baseurlFileUpload}${imageFullName}">
                                    </a>`;
                });
                liveChatItem += `      
                                            ${listReactedMess}
                                        </div>
                                        ${listReaction}
                                    </div>
                                </div>`;
            }
            if (messageType == 'sendFile' && ListFile != null) {
                liveChatItem = '';
                ListFile.forEach(file => {
                    var fileFullName = file.fullName != undefined ? file.fullName : file.FullName;
                    var fileNameDisplay = file.nameDisplay != undefined ? file.nameDisplay : file.NameDisplay;
                    var fileSizeInByte = file.fileSizeInByte != undefined ? file.fileSizeInByte : file.FileSizeInByte;
                    liveChatItem += `<div class="liveChatItem user ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}">
                                        <div class="liveChatTime">${liveChatTime}</div>
                                        <div class="boxChatContent">
                                            <a rel="nofollow" download href="${this.baseurlFileUpload}${fileFullName}"> 
                                                <div class="liveChatContent liveChatContext downloadFile">
                                                    <div class="downloadFileHeader">
                                                        <p class="nameFile">${fileNameDisplay}</p>
                                                        <p class="sizeFile">${fileSizeInByte != undefined ? fileSizeInByte : ""}</p>
                                                        <p class="typeFile">Tệp</p>
                                                    </div>
                                                    <div class="text-center btnDownLoad">Tải xuống</div>
                                                </div>
                                            </a>
                                            ${listReactedMess}
                                            ${listReaction}
                                        </div>
                                    </div>`;
                });
            }
            if (messageType == 'link' && InfoLink != null) {
                const InfoLinkImage = InfoLink.image != null ? `<div class="imageLayout"><img src="${InfoLink.image}"></div>` : "";
                const InfoLinkDescription = InfoLink.description != null ? InfoLink.description : "";
                liveChatItem = `<div class="liveChatItem user ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}">
                                    <div class="boxChatContent">
                                        <div class="liveChatContent liveChatContentMessLink">
                                            <a href="${message}" rel="nofollow" target="_blank">
                                                ${InfoLinkImage}
                                                <b class="titleLayout">${InfoLink.title}</b>
                                                <div class="descriptionLayout">${InfoLinkDescription}</div>
                                                <div class="linkLayout">${InfoLink.linkHome}</div>
                                            </a>
                                        </div>
                                        ${listReactedMess}
                                        ${listReaction}
                                    </div>
                                </div>`
            }
            if (quoteMessage != "" && quoteMessage.messageID != "") {
                liveChatItem = `<div class="liveChatItem user" data-id="${messageID}" data-time="${time}">
                                    <div class="boxChatContent">
                                        <div class="liveChatContent liveChatContext">
                                            <div class="boxShowRepMess">
                                                <img src="/images/livechat/repMess.svg">
                                                <div class="boxContentRepMess">
                                                    <div class="contentRepMess">${quoteMessage.message.replaceAll("\n","<br>")}</div>
                                                    <div class="timeRepMess">Lúc ${this.getTime(quoteMessage.createAt, "answer")}</div>
                                                </div>
                                            </div>
                                            <div class="boxContentRoot">${message.replaceAll("\n","<br>")}</div>
                                        </div>
                                        ${listReactedMess}
                                        ${listReaction}
                                    </div>
                                </div>`;
            }

            return liveChatItem;
        }

        messBySwitchboard(message, senderName, time, messageID, messageType = 'text', ListFile = [], InfoLink = null, quoteMessage = '', emotionMessage = [], showTime) {
            const liveChatLogo = `<div class="liveChatLogo"><div class="SwitchboardLogo"><img src="/images/livechat/w_headphone.svg"></div></div>`,
                switchboardTime = showTime ? this.switchboardTime(senderName, time) : "",
                listReaction = this.getListReaction("user"),
                btnReaction = "",
                listReactedMess = this.getListReactedMess(emotionMessage),
                liveChatTimeDetail = this.getTime(time, "timeMessDetail");

            let liveChatItem = '';
            if (messageType == 'text') {
                liveChatItem = `<div class="liveChatItem support_switchboard ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}" data-time="${time}">
                                    ${liveChatLogo}
                                    <div class="liveChatContent">
                                        <div class="liveChatTime">${switchboardTime}</div>
                                        <div class="boxContentLiveChat p_relative">
                                            <div class="liveChatContentMess liveChatContext">
                                                <div class="liveChatContentText">
                                                    ${message.replaceAll('\n','<br>')}
                                                </div>
                                                <div class="detailTime"><span>${liveChatTimeDetail}</span></div>
                                                ${listReactedMess}
                                                ${btnReaction}
                                            </div>
                                            ${listReaction}
                                        </div>
                                    </div>
                                </div>`;
            }
            if (messageType == 'sendPhoto') {
                liveChatItem = '';
                liveChatItem += `<div class="liveChatItem support_switchboard ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}" data-time="${time}">
                                        ${liveChatLogo}
                                        <div class="liveChatContent image">
                                            <div class="liveChatTime">${switchboardTime}</div>
                                            <div class="boxContentLiveChat p_relative">`;
                ListFile.forEach(image => {
                    var imageFullName = image.fullName != undefined ? image.fullName : image.FullName;
                    var img = `<img src="${this.baseurlFileUpload}${imageFullName}">`;

                    liveChatItem += `<div class="liveChatContentMess image liveChatContext">
                                            <a target="_blank" rel="nofollow" href="${this.baseurlFileUpload}${imageFullName}">${img}</a>
                                        </div>`;
                });
                liveChatItem += `${listReactedMess}
                                ${btnReaction}
                                ${listReaction}
                                </div>
                            </div>
                        </div>`;
            }
            if (messageType == 'sendFile') {
                liveChatItem = '';
                ListFile.forEach(file => {
                    var fileFullName = file.fullName != undefined ? file.fullName : file.FullName;
                    var fileNameDisplay = file.nameDisplay != undefined ? file.nameDisplay : file.NameDisplay;
                    var fileSizeInByte = file.fileSizeInByte != undefined ? file.fileSizeInByte : file.FileSizeInByte;
                    liveChatItem += `<div class="liveChatItem support_switchboard ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}" data-time="${time}">
                                        ${liveChatLogo}
                                        <div class="liveChatContent">
                                            <div class="liveChatTime">${switchboardTime}</div>
                                            <div class="boxContentLiveChat p_relative">
                                                <a rel="nofollow" download href="${this.baseurlFileUpload}${fileFullName}">
                                                    <div class="liveChatContent downloadFile">
                                                        <div class="downloadFileHeader">
                                                            <p class="nameFile">${fileNameDisplay}</p>
                                                            <p class="sizeFile">${fileSizeInByte}</p>
                                                            <p class="typeFile">Tệp</p>
                                                        </div>
                                                        <div class="text-center btnDownLoad">Tải xuống</div>
                                                    </div>
                                                </a>
                                                ${listReactedMess}
                                                ${btnReaction}
                                                ${listReaction}
                                            </div>
                                        </div>
                                    </div>`;
                });
            }
            if (messageType == 'link' && InfoLink != null) {
                const InfoLinkImage = InfoLink.image != null ? `<div class="imageLayout"><img src="${InfoLink.image}"></div>` : "";
                const InfoLinkDescription = InfoLink.description != null ? InfoLink.description : "";
                liveChatItem = `<div class="liveChatItem support_switchboard ${emotionMessage.length > 0 ?"hasReaction":""}">
                                    ${liveChatLogo}
                                    <div class="liveChatContent">
                                        <div class="liveChatTime">${switchboardTime}</div>
                                        <div class="liveChatContentMess liveChatContentMessLink">
                                            <a href="${message}" rel="nofollow" target="_blank">
                                                ${InfoLinkImage}
                                                <b class="titleLayout">${InfoLink.title}</b>
                                                <div class="descriptionLayout">${InfoLinkDescription}</div>
                                                <div class="linkLayout">${InfoLink.linkHome}</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>`
            }
            if (quoteMessage != null && quoteMessage != "" && quoteMessage.messageID != "") {
                liveChatItem = `<div class="liveChatItem support_switchboard ${emotionMessage.length > 0 ?"hasReaction":""}" data-id="${messageID}" data-time="${time}">
                                    ${liveChatLogo}
                                    <div class="liveChatContent">
                                        <div class="liveChatTime">${switchboardTime}</div>
                                        <div class="liveChatContentMess liveChatContext">
                                            <div class="boxShowRepMess">
                                                <img src="/images/livechat/repMess.svg">
                                                <div class="boxContentRepMess">
                                                    <div class="contentRepMess">${quoteMessage.message.replaceAll("\n","<br>")}</div>
                                                    <p class="timeRepMess">Lúc ${this.getTime(quoteMessage.createAt, "answer")}</p>
                                                </div>
                                            </div>
                                            <div class="boxContentRoot">${message.replaceAll("\n","<br>")}</div>
                                        </div>
                                    </div>
                                </div>`
            }
            return liveChatItem;
        }

        messFilePreview(listFile, listFileType) {
            let liveChatItem = "",
                clientMessID;
            const listReaction = this.getListReaction(),
                listReactedMess = this.getListReactedMess([]);
            if (listFileType == 'sendPhoto') {
                clientMessID = liveChat.getClientMessID();
                liveChatItem = `<div class="liveChatItem user" data-id="${clientMessID}">
                                    <div class="liveChatTime"></div>
                                    <div class="boxChatContent">
                                        <div class="liveChatContent liveChatContext image">`;
                listFile.forEach((e) => { liveChatItem += `<a href="${e.result}"><img src="/images/livechat/load.gif" class="lazyload" data-src="${e.result}"></a>`; });
                liveChatItem += `       ${listReactedMess}
                                        </div>
                                        ${listReaction}
                                    </div>
                                </div>`;
            } else if (listFileType == 'sendFile') {
                listFile.forEach((e) => {
                    clientMessID = liveChat.getClientMessID();

                    liveChatItem += `<div class="liveChatItem user" data-id="${clientMessID}"><a rel="nofollow" download><div class="liveChatContent liveChatContext downloadFile"><div class="downloadFileHeader"><p class="nameFile">${e.name}</p><p class="sizeFile"></p><p class="typeFile">Tệp</p></div><div class="text-center btnDownLoad">Tải xuống</div></div></a></div>`;
                })
            }

            return liveChatItem;
        }

        showPreviewImage(fileReader, index) {
            const item = `<div class="itemPreview"><button data-index="${index}" class="closePreview">X</button><img src="${fileReader.result}"></div>`;
            return item;
        }

        showPreviewFile(index) {
            const item = `<div class="itemPreview File"><img src="/images/livechat/icon_file.png"><button data-index="${index}" class="closePreview">X</button></div>`;
            return item;
        }

        addMessToList(message, type = '') {
            if (type == '') {
                this.listConversation.prepend(message);
            } else {
                this.listConversation.append(message);
            }
        }

        message(element, showTime = false) {
            if (socketLiveChat.conversationID == element.conversationID) {
                let mess;
                if (element.senderID == socketLiveChat.userID) {
                    mess = render.messByUser(element.message, element.createAt, element.messageType, element.messageID, element.listFile, element.infoLink, element.quoteMessage, element.emotionMessage, showTime);
                } else {
                    mess = render.messBySwitchboard(element.message, element.senderName, element.createAt, element.messageID, element.messageType, element.listFile, element.infoLink, element.quoteMessage, element.emotionMessage, showTime);
                }
                return mess;
            }
        }

        previewFile() {
            $('#boxPreview,#btnSendMess').removeClass('hidden');
            $('#addFile').addClass('hidden');
            $('div.itemPreview').remove();

            let fileList = this.tawkChatinputAddFile.prop('files');
            for (var j = 0; j < fileList.length; j++) {
                let itemFile = fileList[j];
                this.listFile.push(itemFile);
            }

            const listLength = this.listFile.length,
                self = this;
            let match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];

            for (let i = 0; i < listLength; i++) {

                let file = this.listFile[i],
                    type = file.type,
                    size = file.size,
                    name = file.name;

                if ((type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5])) {
                    let fileReader = new FileReader();

                    fileReader.onload = function(progressEvent) {
                        const item = self.showPreviewImage(fileReader, i);
                        $('#itemAddNewFile').before(item);
                    }
                    fileReader.readAsDataURL(file);
                } else {
                    const item = self.showPreviewFile(i);
                    $('#itemAddNewFile').before(item);
                }
            }
            this.tawkChatinputAddFile.val('');
        }

        userSeen(userName, userAvatar, time) {
            return ``;
            return `<div class="boxSeen">
                        <div class="avatarUserSeen">
                            <img src="${userAvatar}">
                            <span>${userName} đã xem lúc ${time} </span>
                        </div>
                    </div>`;
        }

        reset() {
            this.tawkChatInputEditor
                .val('')
                .attr('rows', 1);
            liveChat.editMessageID = undefined;
            socketLiveChat.outTyping();
            $('div.itemPreview').remove();
            $('#boxPreview,#btnSendMess').addClass('hidden');
            $('#addFile').removeClass('hidden');
            liveChat.closeRepMess();
            this.listFile = [];
        }

        boxEndConversation() {
            return `<div class="p_relative" id="boxEndConversation"><button id="endConversation"><span class="endConversationLine"></span><span class="endConversationLine"></span><span class="endConversationLine"></span></button><ul id="ulEndConversation"><li><button id="btnEndConversation">Dừng cuộc trò chuyện</button></li></ul></div>`;
        }

        boxConfirmEndConversation() {
            return `<div id="boxConfirmEndConversation">
                        <div id="mainEndConversation">
                            <div class="confirmEndConversationHeader">Bạn có chắc chắn muốn dừng cuộc trò chuyện hỗ trợ?</div>
                            <div class="divConfirmEndConversation">
                            <button id="btnCancelConfirmEndConversation">Hủy</button>
                            <button id="btnAcceptEndConversation">Dừng</button>
                            </div>
                        </div>
                    </div>`;
        }

        processTime(time = null) {
            let day, month, date, hours, minutes, seconds, typeTime;
            if (time == null) {
                date = new Date();
            } else {
                date = new Date(time);
            }

            // Lấy ngày, tháng, năm, giờ, phút, giây
            const getDay = date.getUTCDate(),
                getMonth = date.getMonth() + 1,
                year = date.getFullYear(),
                getHours = date.getHours(),
                getMinutes = date.getMinutes(),
                getSeconds = date.getSeconds();

            // Xử lý hiển thị số 0 trước số ngày < 10
            day = (getDay < 10) ? "0" + getDay : getDay;

            // Xử lý hiển thị số 0 trước số tháng < 10
            month = (getMonth < 10) ? "0" + getMonth : getMonth;

            // Xử lý hiển thị số 0 trước số giờ < 10
            hours = (getHours < 10) ? "0" + getHours : getHours;

            // Xử lý hiển thị số 0 trước số phút < 10
            minutes = (getMinutes < 10) ? "0" + getMinutes : getMinutes;

            // Xử lý hiển thị số 0 trước số giây < 10
            seconds = (getSeconds < 10) ? "0" + getSeconds : getSeconds;

            if (getHours < 12) {
                typeTime = " AM";
            } else {
                typeTime = " PM";
            }

            return { day, month, year, hours, minutes, seconds, typeTime };
        }

        getTime(time = null, type = "message") {

            const processTime = this.processTime(time);
            let result;

            if (type == "message") {
                result = `${processTime.hours}:${processTime.minutes} ${processTime.typeTime}`;
            } else if (type == "seenMessage" || type == "answer") {
                result = `${processTime.hours}:${processTime.minutes}:${processTime.seconds} ngày ${processTime.day}/${processTime.month}/${processTime.year}`;
            } else if (type == "timeMessDetail") {
                result = `${processTime.hours}:${processTime.minutes}:${processTime.seconds} ${processTime.typeTime}`;
            }

            return result;
        }

        removeContext() {
            $('.contextMenu').remove();
        }

        contextMenu(conversationID, type) {
            this.removeContext();
            let menuEditMessage = "";
            if (type == "text") {
                menuEditMessage = `<li class="contextMenu-item"><button class="contextMenu-button contextMenuAnswerMessage">Trả lời</button></li>
                                   <li class="contextMenu-item"><button class="contextMenu-button contextMenuEditMessage">Chỉnh sửa</button></li>
                                   <li class="contextMenu-item"><button class="contextMenu-button contextMenuCopyMessage">Sao chép</button></li>`;
            }
            const contextMenu = `<ul data-theme="light" class="contextMenu" id="context${conversationID}">
                                    ${menuEditMessage}
                                    <li class="contextMenu-item"><button class="contextMenu-button contextMenuDeleteMessage">Xóa</button></li>
                                </ul>`;
            $('body').append(contextMenu);
        }

        contextMenuSwitchBoard(conversationID, type) {
            this.removeContext();
            let menuEditMessage = "",
                contextMenu = "";
            if (type == "text") {
                contextMenu = `<ul data-theme="light" class="contextMenu" id="context${conversationID}">
                                   <li class="contextMenu-item"><button class="contextMenu-button contextMenuAnswerMessage">Trả lời</button></li>
                                   <li class="contextMenu-item"><button class="contextMenu-button contextMenuCopyMessage">Sao chép</button></li>
                                </ul>`;
            }

            $('body').append(contextMenu);
        }

        createPosition(e, conversationID) {
            const contextMenu = $('#context' + conversationID);
            const { clientX, clientY } = e;
            const positionY =
                clientY + contextMenu[0].scrollHeight >= window.innerHeight ?
                window.innerHeight - contextMenu[0].scrollHeight - 20 :
                clientY;
            const positionX =
                clientX + contextMenu[0].scrollWidth >= window.innerWidth ?
                window.innerWidth - contextMenu[0].scrollWidth - 20 :
                clientX;

            contextMenu.css({
                "width": contextMenu[0].scrollWidth + "px",
                "height": contextMenu[0].scrollHeight + "px",
                "top": positionY + "px",
                "left": positionX + "px",
            });
        }

        notificationDate(time, today = '') {
            return `<div class="notificationDate ${today}"><span>${time}</span></div>`;
        }

        notification10h30pm() {
            return "";
            // return `<div class="notification10h30pm">
            //             <div class="notification10h30pmImage"><img src="/images/livechat/promote.svg"></div>
            //             <div class="notification10h30pmText"><b>Thông báo:</b> Hiện đã hết giờ trực live, bạn để lại tin nhắn sau đó 8h sáng mai chúng tôi sẽ trả lời tại tài khoản là ID máy tính này.</div>
            //         </div>`;
        }

        switchboardTime(senderName, createAt) {
            return senderName + ", " + this.getTime(createAt);
        }

        dataReaction() {
            return [
                { key: '1', value: '/images/livechat/icon_like.gif' },
                { key: '2', value: '/images/livechat/icon_smile.gif' },
                { key: '3', value: '/images/livechat/icon_heart.gif' },
                { key: '4', value: '/images/livechat/icon_point.gif' },
                { key: '5', value: '/images/livechat/icon_think.gif' },
                { key: '6', value: '/images/livechat/icon_heart_eye.gif' },
                { key: '7', value: '/images/livechat/icon_promise.gif' },
                { key: '8', value: '/images/livechat/icon_hi.gif' },
            ];
        }

        getListBtnReaction() {
            let html = `<ul class="ulReactionMsg">`;
            this.dataReaction().forEach(element => {
                html += `<li><button data-type="${element.key}" class="btnReactionMsg"><img src="${element.value}"></button></li>`;
            });
            html += `</ul>`;
            return html;
        }

        getListReaction(type = "user") {
            let html = `<div class="reactionMsg">
                            <button data-type="1" class="btnLikeReactionMsg">
                                <img src="/images/livechat/icon-like-out.svg">
                            </button>`;
            if (type == "user") {
                html += this.getListBtnReaction();
            }
            html += `</div>`;
            return html;
        }

        getListReactedMess(arrayReactedMess) {
            let status, item, linkEmotion, count, listReactedMess = `<ul class="listReactedMess">`;
            this.dataReaction().forEach(element => {
                item = arrayReactedMess.find(item => item.type == element.key);
                status = (item != undefined) ? "active " : "";
                linkEmotion = (item != undefined) ? item.linkEmotion : element.value;
                count = (item != undefined) ? item.listUserId.length : 0;
                listReactedMess += this.btnReactedMess(element.key, linkEmotion, status, count);
            });
            listReactedMess += `</ul>`;
            return listReactedMess;
        }

        btnReactedMess(type, linkEmotion, status, count = 0) {
            const showCount = (count > 1) ? count : "";
            return `<li>
                        <button class="btnReactedMess ${status}" data-type="${type}">
                            <img src="${linkEmotion}">
                            <span>${showCount}</span>
                        </button>
                    </li>`;
        }

        baseUrlEmotion(type) {
            return `https://mess.timviec365.vn/Emotion/Emotion${type}.png`;
        }

        apiSentMess() {
            return "/livechat/SendMessage.php";
        }

        apiUploadFile() {
            return "/livechat/UploadFile.php";
        }

        apiGetListMessage() {
            return "/livechat/GetListMessage.php";
        }

        apiReadMessage() {
            return "/livechat/ReadMessage.php";
        }

        apiLeaveGroup() {
            return "/livechat/OutGroup.php";
        }

        apiEditMessage() {
            return "/livechat/EditMessage.php";
        }

        apiDeleteMessage() {
            return "/livechat/DeleteMessage.php";
        }

        apiReactionMessage() {
            return "/livechat/SetEmotionMessage.php";
        }
    }

    class SocketLiveChat {
        constructor({ fromWeb, clientSocket }) {
            this.socket = this.connect(fromWeb, clientSocket);
            this.clientId = render.getClientCodeID();
            this.fromWeb = fromWeb;
            this.userID = 59721;
            this.switchboardID;
            this.clientName = "Khách hàng " + fromWeb;
            this.listMember;
            this.conversationID;
            this.loginWithIdDevice();
            this.browserOnEvents();
        }

        connect(fromWeb, clientSocket) {
            let socket;
            if (fromWeb == 'work247' || fromWeb == 'localhost' || clientSocket == undefined) {
                socket = io.connect('wss://socket.timviec365.vn', {
                    secure: true,
                    enabledTransports: ["https"],
                    transports: ['websocket', 'polling']
                });
            } else {
                socket = clientSocket;
            }
            return socket;
        }

        browserOnEvents() {
            this.socket.on("connect", () => {
                if ($('.liveChatBody').hasClass('disconnect')) {
                    this.loginWithIdDevice();
                    if ($('.liveChatItem').length > 0) {
                        render.listConversation.empty();
                        liveChat.init('reload');
                    }
                }
            });
            this.socket.on("disconnect", (e) => {
                $('.liveChatBody').addClass('disconnect');
            });
            this.socket.on('AddNewConversationForClient', (conversationID, listMember) => {
                render.tawkChatInputEditor.removeClass('newConversation');
                this.conversationID = conversationID;
                this.listMember = listMember;
                this.switchboardID = listMember[1];
                if ($('#boxEndConversation').length == 0) {
                    const boxEndConversation = render.boxEndConversation();
                    $('.liveChatHeaderButton').prepend(boxEndConversation);
                }

                // Nếu đang trong ca trực
                if (!liveChat.isTimeShiftOver()) {
                    if (liveChat.isMissed) {
                        liveChat.isMissed = false;
                        clearTimeout(liveChat.runSendMissedMessage);
                    }
                    liveChat.sendMissedMessage();
                }
            });
            this.socket.on("Typing", (userId, conversationID, userNameTyping) => {
                if (this.conversationID == conversationID) {
                    $('#typing').html(userNameTyping + ' đang nhập...');
                }
            });
            this.socket.on('OutTyping', (userId, conversationID) => {
                if (this.conversationID == conversationID) {
                    $('#typing').empty();
                }
            });
            this.socket.on('SendMessage', messageInfo => {
                let dataMessage = {
                    messageID: messageInfo.MessageID,
                    senderID: messageInfo.SenderID,
                    messageType: messageInfo.MessageType,
                    message: messageInfo.Message,
                    conversationID: messageInfo.ConversationID,
                    listFile: messageInfo.ListFile,
                    createAt: messageInfo.CreateAt,
                    senderName: messageInfo.SenderName,
                    quoteMessage: {
                        createAt: messageInfo.QuoteMessage.CreateAt,
                        message: messageInfo.QuoteMessage.Message,
                        messageID: messageInfo.QuoteMessage.MessageID,
                        messageType: messageInfo.QuoteMessage.MessageType,
                        senderID: messageInfo.QuoteMessage.SenderID,
                        senderName: messageInfo.QuoteMessage.SenderName,
                    },
                    emotionMessage: []
                };
                liveChat.listMessages.push(dataMessage);

                let showTime = false,
                    countListMess = liveChat.listMessages.length,
                    lastMessInList = liveChat.listMessages[countListMess - 1],
                    detailTime = render.getTime(messageInfo.CreateAt, "timeMessDetail"),
                    timeLastMess = {};
                if (lastMessInList != null) {
                    timeLastMess = render.getTime(lastMessInList.createAt);
                }

                if (lastMessInList === undefined) {
                    lastMessInList = liveChat.listMessages[0];
                }

                // Nếu là tin nhắn do phía máy khách gửi -> Cập nhật thời gian khi bên còn lại nhận tin nhắn để đồng bộ
                if (messageInfo.ConversationID == this.conversationID && messageInfo.SenderID == this.userID) {
                    const timeSever = render.getTime(messageInfo.CreateAt),
                        itemLiveChat = liveChat.getLiveChatItemByID(messageInfo.MessageID);

                    // Cập nhật data thời gian
                    itemLiveChat
                        .attr('data-time', messageInfo.CreateAt)

                    // Cập nhật hiển thị thời gian
                    itemLiveChat
                        .find('.detailTime span')
                        .html(detailTime);

                    if (timeLastMess.minutes != detailTime.minutes || lastMessInList.senderID != socketLiveChat.userID) {
                        itemLiveChat
                            .find('.liveChatTime')
                            .html(timeSever);
                    }
                }

                if (messageInfo.ConversationID == this.conversationID && (messageInfo.SenderID != this.userID || messageInfo.MessageType == "sendFile" || messageInfo.MessageType == "link")) {
                    $('.boxSeen').remove();
                    let infoLink = null;
                    if (messageInfo.MessageType == 'link' && messageInfo.InfoLink != null) {
                        infoLink = {
                            description: messageInfo.InfoLink.Description,
                            haveImage: messageInfo.InfoLink.HaveImage,
                            image: messageInfo.InfoLink.Image,
                            isNotification: messageInfo.InfoLink.IsNotification,
                            linkHome: messageInfo.InfoLink.LinkHome,
                            messageID: messageInfo.InfoLink.MessageID,
                            title: messageInfo.InfoLink.Title,
                            typeLink: messageInfo.InfoLink.TypeLink,
                        }
                    }
                    dataMessage.infoLink = infoLink;

                    if (timeLastMess.minutes != detailTime.minutes) {
                        showTime = true;
                    }
                    showTime = render.checkShowMessTime(dataMessage, lastMessInList);

                    let mess = render.message(dataMessage, showTime);

                    render.addMessToList(mess, 'append');
                    render.listConversation.animate({ scrollTop: render.listConversation.get(0).scrollHeight }, 0);

                    // Nếu là tin nhắn đến của chuyên viên và đang trong trạng thái tính thời gian để gửi tin nhắn nhỡ
                    if (messageInfo.SenderID != this.userID && liveChat.isMissed == true) {
                        liveChat.isMissed = false;
                        clearTimeout(liveChat.runSendMissedMessage);
                    }

                    if (!$('.widget').hasClass('active') || !render.tawkChatInputEditor.is(":focus")) {
                        const talk_button = $('.talk_button');

                        // Xử lý hiển thị số tin nhắn người dùng chưa đọc khi ẩn cuộc trò chuyện
                        let dataUnread = talk_button.attr('data-unread');
                        if (dataUnread == undefined) {
                            dataUnread = 1;
                        } else {
                            dataUnread = parseInt(dataUnread) + 1;
                        }

                        // Hiển thị số liệu sau khi xử lý ở trên
                        talk_button
                            .addClass('unreader')
                            .attr('data-unread', dataUnread);
                    }

                    if (!$('.widget').hasClass('active') || !liveChat.isTabActive) {
                        liveChat.callNotification(messageInfo.SenderName, messageInfo.SenderAvatar, messageInfo.MessageType, messageInfo.Message);
                    }
                }
            });
            this.socket.on("DeleteConversation", (conversationID) => {
                if (this.conversationID != undefined && this.conversationID == conversationID) {
                    localStorage.removeItem("_DEVICEID_");
                    location.reload();
                }
            });
            this.socket.on('ReadMessage', (data) => {
                $('.boxSeen').remove();
                if (data.userName != undefined && data.avatarName != undefined && data.timeSeener != undefined) {
                    const userSeen = render.userSeen(data.userName, data.avatarName, render.getTime(data.timeSeener, 'seenMessage'));
                    $('.liveChatItem')
                        .last()
                        .after(userSeen);
                }
                render.listConversation.animate({ scrollTop: render.listConversation.get(0).scrollHeight }, 0);
            });
            this.socket.on("EditMessage", (conversationID, messageID, message) => {
                const liveChatItem = liveChat.getLiveChatItemByID(messageID);
                if (liveChatItem.find('.boxShowRepMess').length == 0) {
                    liveChatItem
                        .find('.liveChatContentMess')
                        .html(message.replaceAll("\n", "<br>"))
                } else {
                    liveChatItem
                        .find('.boxContentRoot')
                        .html(message.replaceAll("\n", "<br>"))
                }
            });
            this.socket.on("DeleteMessage", (conversationID, messageID) => {
                liveChat.getLiveChatItemByID(messageID).remove()
            });
            this.socket.on("EmotionMessage", (userId, messageID, conversationID, type, linkEmotion) => {
                if (this.conversationID != undefined && this.conversationID == conversationID) {
                    liveChat.reactionMessage(messageID, type, linkEmotion, userId);
                }
            });
        }

        loginWithIdDevice() {
            this.socket.emit('LoginWithIdDevice', this.clientId, this.fromWeb);
        }

        typing() {
            if (this.conversationID != undefined && this.switchboardID != undefined) {
                this.socket.emit("Typing", this.userID, this.conversationID, [this.switchboardID], this.clientName);
            }
        }

        outTyping() {
            if (this.conversationID != undefined && this.switchboardID != undefined) {
                this.socket.emit("OutTyping", this.userID, this.conversationID, [this.switchboardID], this.clientName);
            }
        }

        leaveGroup(userID) {
            if (this.conversationID != undefined) {
                this.socket.emit("OutGroup", this.conversationID, userID, -1, this.listMember);
            }
        }

        editMessage(MessageID, Message) {
            const messageInfo = {
                ConversationID: this.conversationID,
                MessageID,
                Message
            };
            this.socket.emit("EditMessage", messageInfo, [this.clientId, this.switchboardID]);
        }

        deleteMessage(MessageID) {
            const messageInfo = {
                ConversationID: this.conversationID,
                MessageID
            };
            this.socket.emit("DeleteMessage", messageInfo, [this.clientId, this.switchboardID]);
        }

        readMessage() {
            if (this.switchboardID != undefined && this.conversationID != undefined) {
                this.socket.emit("ReadMessage", this.userID, this.conversationID, [this.switchboardID], [this.clientId, this.switchboardID]);
            }
        }

        reactionMessage(messageID, type, linkEmotion, isChecked, messageType, message) {
            this.socket.emit('EmotionMessage', this.userID, messageID, this.conversationID, type, linkEmotion, this.listMember, isChecked, messageType, message);
        }
    };

    class LiveChat {
        constructor() {
            this.isMissed; // Có phải là tin nhắn nhỡ hay không?
            this.missedMessage; // Nội dung tin nhắn nhỡ
            this.listFileMissed = []; // Danh sách file của tin nhắn nhỡ
            this.timeOutMissed = 30000; // Thời gian được tính là tin nhắn nhỡ từ thời điểm khách nhắn cho chuyên viên mà chuyên viên không trả lời. (30s)
            this.clientMessID = 0; // Dùng để nhận biết tin nhắn khi khách hàng vừa mới gửi lên để socket có thể gắn ID phục vụ cho việc lấy ID chỉnh sửa và xóa tin nhắn
            this.runSendMissedMessage;
            this.isTabActive;
            this.hasMessage = true;
            this.editMessageID;
            this.dataAnswer;
            this.page;
            this.listMessages = [];
            this.isCheckedReaction;
        }

        callAjax(url, data, beforeSend = null, callback = null, async = false, method = "POST") {
            $.ajax({
                type: method,
                url: url,
                data: data,
                async: async,
                dataType: "json",
                beforeSend: beforeSend,
                success: function(response) {
                    if (callback != null) {
                        callback(response)
                    }
                }
            });
        }

        getEmployeeID() {
            return socketLiveChat.listMember.find(function(key) {
                return key != socketLiveChat.userID
            });
        }

        getLiveChatItemByID(messageID) {
            return $('.liveChatItem[data-id=' + messageID + ']');
        }

        getIDContextMenu(e) {
            return $(e).parents('.contextMenu').attr('id').replace('context', '');
        }

        updateUnread() {
            if ($('.talk_button').hasClass('unreader')) {
                $('.talk_button')
                    .removeClass('unreader')
                    .removeAttr('data-unread');
                const dataAPI = {
                        senderId: socketLiveChat.userID,
                        conversationId: socketLiveChat.conversationID
                    },
                    readMessageSuccess = function(response) {
                        if (response.data != null) {
                            socketLiveChat.readMessage();
                        }
                    };
                this.callAjax(render.apiReadMessage(), dataAPI, null, readMessageSuccess);
            }
        }

        loadListMessages(typeLoading = "loadNew", page = 0) {

            if (this.isTimeShiftOver()) {
                this.showNoticeShiftOver();
            }
            if (typeLoading == 'reload') {
                page = 0;
            }

            if (this.hasMessage == true || typeLoading == 'reload') {
                const data = { clientId: socketLiveChat.clientId, fromWeb: socketLiveChat.fromWeb, countMess: page, countLoad: 30 },
                    self = this;
                $.ajax({
                    type: "POST",
                    url: render.apiGetListMessage(),
                    data: data,
                    dataType: "json",
                    beforeSend: function() {
                        if (typeLoading == 'loadNew') {
                            render.listConversation.append('<div id="waiting"><p class="loading">Loading</p></div>')
                        }
                    },
                    success: function(response) {
                        if (response != '') {
                            $("#waiting").remove();
                            render.tawkChatInputEditor.removeAttr("disabled");

                            const responseData = response.data;

                            if (responseData == null) {
                                render.tawkChatInputEditor
                                    .addClass("newConversation");
                            } else {
                                if (typeLoading == 'reload') {
                                    // Reset page sau khi cập nhật
                                    liveChat.page = undefined;
                                }

                                // Nếu khách hàng đã có cuộc trò chuyện trước đó và đang trong trạng thái chờ chuyên viên bắt cuộc trò chuyện thì gán class để gửi tin nhắn vào nhóm.
                                if (responseData.listMember.length == 1) {
                                    render.tawkChatInputEditor
                                        .addClass("newConversation");
                                }

                                // Nếu là lần đầu tiên load hoặc load lại sau khi disconnect sever
                                if (page == 0) {
                                    // Gắn ID cuộc trò chuyện
                                    socketLiveChat.conversationID = responseData.conversationId;
                                    // Gắn listMember
                                    socketLiveChat.listMember = responseData.listMember;
                                    // Gắn ID chuyên viên
                                    socketLiveChat.switchboardID = self.getEmployeeID();

                                    // Nếu nhóm có 2 thành viên thì hiển thị ô hủy cuộc trò chuyện
                                    if (responseData.listMember.length > 1 && $('#boxEndConversation').length == 0) {
                                        const boxEndConversation = render.boxEndConversation();
                                        $('.liveChatHeaderButton').prepend(boxEndConversation);
                                    }

                                    // Hiển thị số tin nhắn chưa đọc
                                    const unReader = responseData.unReader;
                                    if (unReader > 0) {
                                        $('.talk_button')
                                            .addClass('unreader')
                                            .attr('data-unread', unReader);
                                    }
                                }
                                // Nếu là load lần phân trang
                                else if (responseData.listMessages.length > 0 && page > 0) {
                                    render.listConversation.animate({ scrollTop: 200 }, 0);
                                }
                                // Nếu là lần phân trang mà ko còn tin nhắn thì đánh dấu
                                else if (responseData.listMessages.length == 0) {
                                    self.hasMessage = false;
                                }

                                const inforSeen = {
                                    lastMess: responseData.messageId,
                                    userName: responseData.nameLastSeener,
                                    userAvatar: responseData.avatarLastSeener,
                                    time: responseData.timeLastSeener
                                };

                                // Load danh sách tin nhắn đã gửi
                                render.loadListMess(responseData.listMessages, inforSeen);
                                if (page == 0) {
                                    render.listConversation.animate({ scrollTop: render.listConversation.get(0).scrollHeight }, 0);
                                }
                            }
                        } else {
                            location.reload();
                        }
                    },
                    error: function() { $("#waiting").remove() }
                });
            }
        }

        rowMessInput(message) {
            const lines = message.split("\n"),
                count = lines.length;
            render.tawkChatInputEditor.attr('rows', count);
        }

        sendMessToGroup(message, type = 'normal') {
            const conversationID = render.getConversationGroupID();
            socketLiveChat.conversationID = conversationID;
            const dataSendToGroup = {
                LiveChat: { ClientId: socketLiveChat.clientId, ClientName: `Khách hàng ${hostname}`, FromWeb: socketLiveChat.fromWeb },
                InfoSupport: { Title: "Hỗ trợ", Message: `Xin chào, ID: ${socketLiveChat.clientId}, website: ${hostname}, tôi cần bạn hỗ trợ!` }
            };

            if (type == 'missed') {
                dataSendToGroup.InfoSupport.Title = "Tin nhắn nhỡ";
                dataSendToGroup.InfoSupport.Status = 2;
                dataSendToGroup.InfoSupport.UserId = this.getEmployeeID();
            }

            this.sendMessage(conversationID, message, dataSendToGroup);
        }

        sendMessage(conversationID, message, dataSendToGroup = null) {
            // Gửi tin nhắn dạng tệp, hình ảnh
            if (render.listFile.length > 0 || this.listFileMissed.length > 0) {
                let messFile = [],
                    formData = new FormData(),
                    obj,
                    MessageType,
                    listPreview = [];
                const match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];

                for (let i = 0; i < render.listFile.length; i++) {
                    const file = render.listFile[i],
                        fullName = file.name,
                        size = file.size,
                        type = file.type;
                    formData.append('file[]', file);
                    if ((type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5])) {
                        var reader = new FileReader();
                        MessageType = "sendPhoto";
                        reader.onload = async function(e) {
                            var image = new Image();
                            image.src = e.target.result;
                            image.onload = function() {
                                var height = this.height;
                                var width = this.width;
                                obj = { TypeFile: "sendPhoto", SizeFile: size, Width: width, Height: height };
                                messFile.push(obj);

                            };
                        }
                        reader.readAsDataURL(file);
                        listPreview.push(reader);
                    } else {
                        MessageType = "sendFile";
                        obj = { TypeFile: "sendFile", SizeFile: size, NameDisplay: fullName };
                        messFile.push(obj);
                    }
                }
                // Chờ 1s sau khi xử lý xong phần load ảnh để lấy width,height rồi gửi ảnh
                setTimeout(() => {
                    const messPreview = render.messFilePreview(listPreview, MessageType);

                    render.listConversation
                        .append(messPreview)
                        .animate({ scrollTop: render.listConversation.get(0).scrollHeight }, 0);
                    this.sendFileToChat(formData, conversationID, MessageType, messFile, dataSendToGroup);
                }, 1000);
            }
            // Gửi tin nhắn dạng text
            if (message != '') {
                let dataMessage = {
                        ConversationID: conversationID,
                        SenderID: socketLiveChat.userID,
                        MessageType: "text",
                        Message: message,
                    },
                    dataAnswer;
                const self = this;

                if (dataSendToGroup != null) {
                    dataMessage.LiveChat = JSON.stringify(dataSendToGroup.LiveChat);
                    dataMessage.InfoSupport = JSON.stringify(dataSendToGroup.InfoSupport);
                }

                if (this.dataAnswer != undefined) {
                    dataMessage.Quote = JSON.stringify(this.dataAnswer);
                    dataAnswer = {
                        "messageID": this.dataAnswer.MessageID,
                        "senderID": socketLiveChat.userID,
                        "senderName": "Hỗ trợ khách hàng",
                        "createAt": this.dataAnswer.CreateAt,
                        "messageType": "text",
                        "message": this.dataAnswer.Message
                    };
                }

                const beforeSendMess = function() {
                        if (dataSendToGroup == null || (dataSendToGroup != null && !dataSendToGroup.InfoSupport.hasOwnProperty('Status'))) {
                            const time = render.getTime(),
                                clientMessID = self.getClientMessID(),
                                mess = render.messByUser(message, time, "text", clientMessID, [], null, dataAnswer);

                            // Hiển thị lên danh sách
                            render.listConversation
                                .append(mess)
                                .animate({ scrollTop: render.listConversation.get(0).scrollHeight }, 0);
                        }
                    },
                    sendMessageSuccess = function(response) {
                        self.updateliveChatItemID(response.data.messageId);
                    };

                // Gọi API
                liveChat.callAjax(render.apiSentMess(), dataMessage, beforeSendMess, sendMessageSuccess);
            }
        }

        sendFileToChat(formData, conversationID, MessageType, messFile, dataSendToGroup = null) {
            var result;
            const self = this;
            $.ajax({
                url: render.apiUploadFile(),
                type: "POST",
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                dataType: 'JSON',
                async: false,
                success: function(response) {
                    const listNameFile = response.data.listNameFile;

                    for (let i = 0; i < listNameFile.length; i++) {
                        messFile[i].FullName = listNameFile[i];
                    }

                    let dataMessage = {
                        ConversationID: conversationID,
                        SenderID: socketLiveChat.userID,
                        MessageType: MessageType,
                        Message: 'a',
                        File: JSON.stringify(messFile)
                    };

                    if (dataSendToGroup != null) {
                        dataMessage.LiveChat = JSON.stringify(dataSendToGroup.LiveChat);
                        dataMessage.InfoSupport = JSON.stringify(dataSendToGroup.InfoSupport);
                    }
                    const sendMessageSuccess = function(responseSentMess) {
                        self.updateliveChatItemID(responseSentMess.data.messageId);
                    };
                    self.callAjax(render.apiSentMess(), dataMessage, null, sendMessageSuccess);
                }
            });
        }

        editMessage(MessageID, Message) {
            const data = { MessageID, Message, ConversationID: socketLiveChat.conversationID },
                self = this,
                beforeEditMessage = function(response) {
                    // Hiển thị nội dung tin nhắn sau khi đã chỉnh sửa
                    const LiveChatItem = self.getLiveChatItemByID(MessageID);
                    if (LiveChatItem.find('.boxShowRepMess').length == 0) {
                        LiveChatItem
                            .find(".liveChatContentText")
                            .html(Message.replaceAll('\n', '<br>'));
                    } else {
                        LiveChatItem
                            .find(".boxContentRoot")
                            .html(Message.replaceAll('\n', '<br>'))
                    }

                    // Gửi socket
                    socketLiveChat.editMessage(MessageID, Message);
                };

            // Gọi API
            this.callAjax(render.apiEditMessage(), data, beforeEditMessage);
        }

        sendMessToChat() {
            // Nếu nhắn vào giờ chuyển giao giữa thời gian không trực và trực thì bỏ thông báo đi
            if (!this.isTimeShiftOver() && $('.notification10h30pm').length) {
                $('.notification10h30pm').remove();
            }

            const message = render.tawkChatInputEditor.val().trim();
            // Nếu có class newConversation thì là chưa có cuộc trò chuyện, cần chuyên viên bắt để có cuộc trò chuyện
            if (render.tawkChatInputEditor.hasClass('newConversation')) {
                this.sendMessToGroup(message);
                this.missedMessage = message;
            } else {
                // Chỉnh sửa tin nhắn
                if (this.editMessageID != undefined) {
                    this.editMessage(this.editMessageID, message);
                }

                // Gửi tin nhắn mới
                else {
                    this.missedMessage = message;
                    this.listFileMissed = render.listFile;
                    this.sendMessage(socketLiveChat.conversationID, message);


                    // Nếu đang trong ca trực
                    if (!this.isTimeShiftOver()) {
                        if (this.isMissed) {
                            this.isMissed = false;
                            clearTimeout(this.runSendMissedMessage);
                        }
                        this.sendMissedMessage();
                    }

                }
            }
            render.reset();
        }

        showBoxConfirmEndConversation() {
            $('#endConversation').removeClass('active');
            $('#ulEndConversation').hide()
            const boxEndConversation = render.boxConfirmEndConversation();
            render.liveChatMain.append(boxEndConversation);
        }

        removeConfirmEndConversation(e) {
            $('#boxConfirmEndConversation').remove();
        }

        leaveGroup(userID, adminId, type = "userLeave") {
            // Gửi API Rời nhóm
            this.callAjax(render.apiLeaveGroup(), {
                conversationId: socketLiveChat.conversationID,
                senderId: userID,
                adminId: adminId
            });

            // Gửi socket hiển thị trạng thái rời nhóm
            socketLiveChat.leaveGroup(userID);

            // Thông báo rời nhóm
            this.callAjax(render.apiSentMess(), {
                ConversationID: socketLiveChat.conversationID,
                SenderID: userID,
                MessageType: "notification",
                Message: userID + " leaved this consersation"
            });

            render.tawkChatInputEditor.addClass("newConversation");

            if (type == "userLeave") {
                // Cập nhật lại thông số như ban đầu.
                socketLiveChat.conversationID, socketLiveChat.listMember, socketLiveChat.switchboardID = undefined;

                $('#boxEndConversation').remove();
                this.removeConfirmEndConversation();
                render.listConversation.empty();
                render.reset();
            }
        }

        sendMissedMessage() {
            if (socketLiveChat.conversationID != undefined && socketLiveChat.listMember != undefined) {
                this.isMissed = true;

                this.runSendMissedMessage = setTimeout(() => {
                    if (this.isMissed) {
                        const userID = liveChat.getEmployeeID(),
                            adminId = socketLiveChat.userID;
                        this.leaveGroup(userID, adminId, 'switchboardLeave');
                        this.sendMessToGroup(this.missedMessage, 'missed');
                    }
                }, liveChat.timeOutMissed);
            }
        }

        deleteMessage(MessageID) {
            const self = this,
                data = { MessageID },
                beforeDeleteMessage = function() {
                    self.getLiveChatItemByID(MessageID).remove();
                    socketLiveChat.deleteMessage(MessageID);
                }
            this.callAjax(render.apiDeleteMessage(), data, beforeDeleteMessage);
        }

        callNotification(senderName, senderAvatar, messageType, message) {
            if (Notification.permission === "granted") {
                this.notificationMessage(senderName, senderAvatar, messageType, message);
            } else if (Notification.permission !== "denied") {
                Notification.requestPermission().then(permission => {
                    if (permission === "granted") {
                        this.notificationMessage(senderName, senderAvatar, messageType, message);
                    }
                });
            }

        }

        notificationMessage(senderName, senderAvatar, messageType, message) {
            let bodyMessage = senderName;
            if (messageType == 'text') {
                bodyMessage += ": " + message;
            } else if (messageType == 'sendPhoto') {
                bodyMessage += ": Đã gửi hình ảnh.";
            } else if (messageType == 'sendFile') {
                bodyMessage += ": Đã gửi tệp đính kèm.";
            }
            if (bodyMessage != senderName) {
                const notification = new Notification(senderName, {
                    body: bodyMessage,
                    icon: senderAvatar
                });

                notification.onclick = (e) => {
                    window.focus();
                    if (!$('.widget').hasClass('active')) {
                        $('.talk_button').click();
                        render.tawkChatInputEditor.focus();
                    }
                }
            }
        }

        getClientMessID() {
            return "loadingClientMessID";
        }

        updateliveChatItemID(responseMessID) {
            this.getLiveChatItemByID("loadingClientMessID").attr('data-id', responseMessID);
        }

        closeRepMess() {
            $('#boxRepMess')
                .removeClass('active')
                .hide()
                .find('#contentRepMess,#timeRepMess')
                .empty();
            this.dataAnswer = undefined;
        }

        getTextInLiveChatItem(liveChatItem) {
            let contentMess;
            if (liveChatItem.hasClass('user')) {
                if (liveChatItem.find('.boxShowRepMess').length == 0) {
                    contentMess = liveChatItem
                        .find('.liveChatContentText')
                        .html()
                        .trim();
                } else {
                    contentMess = liveChatItem
                        .find('.boxContentRoot')
                        .html()
                        .trim();
                }
            } else {
                if (liveChatItem.find('.boxShowRepMess').length == 0) {
                    contentMess = liveChatItem
                        .find('.liveChatContentText')
                        .html()
                        .trim()
                } else {
                    contentMess = liveChatItem
                        .find('.boxContentRoot')
                        .html()
                        .trim();
                }
            }
            return contentMess;
        }

        coppyText(innerHTML) {
            var aux = `<textarea id="aux">` + innerHTML.replaceAll('<br>', '\n') + `</textarea>`;
            $('body').append(aux);
            // Highlight its content
            $('#aux').select();
            document.execCommand("copy");
            $('#aux').remove();
        }

        isTimeShiftOver() {
            const date = new Date(),
                hours = date.getHours(),
                minutes = date.getMinutes();
            if ((hours == 22 && minutes > 30) || (hours > 22 || hours < 8)) {
                return true;
            }

            return false;
        }

        showNoticeShiftOver() {
            $('.notification10h30pm').remove();
            render.listConversation.append(render.notification10h30pm());
        }

        getItemMessage(messageID) {
            return this.listMessages.find(item => item.messageID == messageID);
        }

        reactionMessage(messageID, type, linkEmotion, userID, btnFrom = "list") {
            const itemMessage = this.getItemMessage(messageID);
            const emotionMessage = itemMessage.emotionMessage,
                btnReactedMess = $('.liveChatItem[data-id="' + messageID + '"]').find('.btnReactedMess[data-type="' + type + '"]');
            userID = userID.toString();

            // Nếu trạng thái cảm xúc đó chưa được sử dụng.
            if (emotionMessage.length == 0 || itemMessage.emotionMessage.find(itemEmotion => itemEmotion.type == type) == undefined) {
                // Hiển thị icon
                btnReactedMess
                    .addClass('active')
                    .find('img')
                    .attr('src', linkEmotion);

                // Thêm icon vào trong mảng
                emotionMessage.push({
                    isChecked: false,
                    linkEmotion,
                    listUserId: [userID],
                    type
                });

                this.isCheckedReaction = false;
            } else {
                const emotionListUserId = emotionMessage.find(itemEmotion => itemEmotion.type == type).listUserId,
                    checkUserReaction = emotionListUserId.indexOf(userID);

                // Nếu tin nhắn đó có người thả cảm xúc nhưng không phải mình => tăng số lượng hiển thị ở dưới
                if (checkUserReaction == -1) {
                    btnReactedMess
                        .find('span')
                        .html(2);
                    emotionListUserId.push(userID);
                    this.isCheckedReaction = false;
                }
                // Nếu đã thả cảm xúc mà có nhiều hơn 1 người thả cảm xúc => giảm số lượng hiển thị
                else if (checkUserReaction != -1 && emotionListUserId.length > 1) {
                    btnReactedMess
                        .find('span')
                        .empty();
                    emotionListUserId.splice(checkUserReaction, 1);
                    this.isCheckedReaction = true;
                }
                // Nếu tin nhắn đã có người thả cảm xúc và chỉ có mình thực hiện => ẩn icon
                else {
                    const pos = emotionMessage.map(e => e.type).indexOf(type);
                    emotionMessage.splice(pos, 1);
                    btnReactedMess.removeClass('active');
                    this.isCheckedReaction = true;
                }
            }

            // Nếu chưa thả cảm xúc thì thêm class dãn cách dòng
            if ($('.liveChatItem[data-id="' + messageID + '"]').find('.btnReactedMess.active').length == 0) {
                $('.liveChatItem[data-id="' + messageID + '"]').removeClass('hasReaction');
            } else {
                $('.liveChatItem[data-id="' + messageID + '"]').addClass('hasReaction');
            }
        }

        init(type = 'loadNew') {
            this.loadListMessages(type);
        }
    };

    // Khởi tạo
    const render = new Render(),
        liveChat = new LiveChat(),
        socketLiveChat = new SocketLiveChat({ fromWeb, clientSocket: socket });
    // Kết thúc khởi tạo

    // Resize box main
    var isResizing = false,
        container = $('#liveChatContainer'),
        lastDownX = 0;

    // Xử lý sự kiện hành động
    $('.talk_button')
        .click(function() {
            render.changeBody('show');
            liveChat.updateUnread();
            render.tawkChatInputEditor.focus();
            if (!$(this).hasClass('connected')) {
                $(this).addClass('connected');
                liveChat.init();
            }
        });

    $('#liveChatClose')
        .click(function() {
            render.changeBody('hide');
        });

    $('#addFile,#itemAddNewFile')
        .click(function() {
            render.tawkChatinputAddFile.click()
        });

    render.tawkChatinputAddFile
        .change(function() {
            render.previewFile();
        });

    render.tawkChatInputEditor
        .focus(function() {
            liveChat.updateUnread();
        })
        .keydown(function(event) {
            const tawkChatInputEditor = $(this),
                message = tawkChatInputEditor.val().trim(),
                lines = message.split("\n"),
                count = lines.length;
            let listFile = render.listFile,
                rows = parseInt(tawkChatInputEditor.attr('rows'));

            // Nhấn enter
            if (event.keyCode == 13 && !event.shiftKey && (message != '' || listFile.length > 0)) {
                event.stopPropagation();
                liveChat.sendMessToChat();
                return false
            }
            // Nhấn shift + enter
            else if (event.keyCode == 13 && event.shiftKey) {
                if (rows < 10) {
                    tawkChatInputEditor.attr('rows', (rows + 1));
                }
            }
        })
        .bind("paste", function(event) {
            const tawkChatInputEditor = $(this),
                message = tawkChatInputEditor.val().trim();

            liveChat.rowMessInput(message);

            var items = (event.clipboardData || event.originalEvent.clipboardData).items;
            for (var index in items) {
                var item = items[index];
                if (item.kind === 'file') {
                    var blob = item.getAsFile();
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    render.listFile.push(blob);
                }
            }
            if (render.listFile.length > 0) render.previewFile();

        })
        .keyup(function(event) {
            const tawkChatInputEditor = $(this),
                message = tawkChatInputEditor.val().trim(),
                lines = message.split("\n"),
                count = lines.length;
            let listFile = render.listFile,
                rows = parseInt(tawkChatInputEditor.attr('rows'));

            if (message != '' || listFile.length > 0) {
                render.showBtnSendMessage();
                if (message.length == 1) {
                    socketLiveChat.typing();
                } else if (message.length == 0) {
                    socketLiveChat.outTyping();
                }
            } else {
                render.reset();
            }

            // Nhấn back
            if (event.keyCode == 8) {
                if (count > 1) {
                    tawkChatInputEditor.attr('rows', (rows - 1));
                }
                if (message == '' || count == 1) {
                    tawkChatInputEditor.empty().attr('rows', 1);
                    if (message == '') {
                        socketLiveChat.outTyping();
                    }
                }
            }
        });

    // Phân trang
    render.listConversation
        .scroll(function() {
            const elm = $(this),
                scrollTop = elm.scrollTop();
            if (scrollTop == 0) {
                if (liveChat.page == undefined) {
                    liveChat.page = 1;
                } else {
                    liveChat.page++;
                }

                liveChat.loadListMessages('loadNew', liveChat.page);
            }
        });

    $('#btnSendMess')
        .click(function() {
            liveChat.sendMessToChat();
        });

    $(document)
        .click(function(event) {
            render.removeContext();
        })
        .on('click', '.closePreview', function() {
            const btn = $(this),
                index = btn.attr('data-index');

            btn.parent().remove();
            render.listFile.splice(index, 1);
            render.previewFile();

            if ($('div.itemPreview').length == 0) {
                $('#boxPreview').addClass('hidden');
            }
        })
        .on('click', '#endConversation', function() {
            const elm = $(this);
            if (!elm.hasClass('active')) {
                elm.addClass('active')
                    .next()
                    .css('display', 'flex');
            } else {
                elm.removeClass('active')
                    .next()
                    .hide();
            }
        })
        .on('click', '#btnEndConversation', function() {
            liveChat.showBoxConfirmEndConversation();
        })
        .on('click', '#btnCancelConfirmEndConversation', function() {
            liveChat.removeConfirmEndConversation();
        })
        .on('click', '#btnAcceptEndConversation', function() {
            const userID = socketLiveChat.userID,
                adminId = liveChat.getEmployeeID();

            liveChat.leaveGroup(userID, adminId);
        })
        // Click để hiển thị menu
        .on('contextmenu', '.liveChatContext', function(event) {
            const elm = $(this),
                itemParent = elm.parents('.liveChatItem'),
                messageID = itemParent.attr('data-id');
            let typeContext = "text";
            if (elm.hasClass('image') || elm.hasClass('downloadFile')) {
                typeContext = "notText";
            }
            if (itemParent.hasClass('user')) {
                render.contextMenu(messageID, typeContext);
            } else {
                render.contextMenuSwitchBoard(messageID, typeContext);
            }

            // Xử lý hiển thị vị trí của box
            render.createPosition(event, messageID);
            return false;
        })
        // Chỉnh sửa tin nhắn
        .on('click', '.contextMenuEditMessage', function() {
            // Chỉnh sửa tin nhắn
            liveChat.closeRepMess();
            const messageID = liveChat.getIDContextMenu(this),
                liveChatItem = liveChat.getLiveChatItemByID(messageID),
                message = liveChat.getTextInLiveChatItem(liveChatItem).replaceAll("<br>", "\n");

            // Hiển thị ra box nhập tin nhắn
            liveChat.rowMessInput(message);
            render.tawkChatInputEditor
                .val(message);
            liveChat.editMessageID = messageID;
        })
        // Xóa tin nhắn
        .on('click', '.contextMenuDeleteMessage', function() {
            if (confirm("Bạn có chắc chắn muốn xóa tin nhắn này ??")) {
                const messageID = liveChat.getIDContextMenu(this);
                liveChat.deleteMessage(messageID);
            }
        })
        // Trả lời tin nhắn
        .on('click', ".contextMenuAnswerMessage", function() {
            const messageID = liveChat.getIDContextMenu(this),
                liveChatItem = liveChat.getLiveChatItemByID(messageID),
                dataTime = liveChatItem.attr('data-time'),
                timeMess = "Lúc  " + render.getTime(dataTime, 'answer'),
                contentMess = liveChat.getTextInLiveChatItem(liveChatItem);

            liveChat.dataAnswer = {
                "MessageID": messageID,
                "SenderID": socketLiveChat.userID,
                "SenderName": "Hỗ trợ khách hàng",
                "CreateAt": dataTime,
                "MessageType": "text",
                "Message": contentMess
            };

            // Nội dung tin nhắn trả lời
            $('#contentRepMess').html(contentMess);

            // Thời gian tin nhắn trả lời
            $('#timeRepMess').html(timeMess);

            // Hiển thị box
            $('#boxRepMess')
                .addClass('active')
                .show();

            // Focus vào ô nhập tin nhắn
            render.tawkChatInputEditor.focus();

            // Hiển thị nút gửi
            render.showBtnSendMessage();
        })
        // Đóng trạng thái trả lời tin nhắn
        .on('click', '#closeRepMess', function() {
            liveChat.closeRepMess();
        })
        // Sao chép tin nhắn
        .on('click', '.contextMenuCopyMessage', function() {
            const messageID = liveChat.getIDContextMenu(this),
                liveChatItem = liveChat.getLiveChatItemByID(messageID),
                contentMess = liveChat.getTextInLiveChatItem(liveChatItem);

            liveChat.coppyText(contentMess);
        })
        .on('mousemove', function(e) {
            if (!isResizing)
                return;
            var offsetRight = container.width() - (e.clientX - container.offset().left);

            render.liveChatMain.css('width', offsetRight);
        })
        .on('mouseup', function(e) {
            // stop resizing
            isResizing = false;
        })
        // Thả cảm xúc trong danh sách
        .on('click', '.btnReactionMsg,.btnLikeReactionMsg', function() {
            const btnReactionMsg = $(this),
                itemParent = btnReactionMsg.parents('.liveChatItem'),
                messageID = itemParent.attr('data-id'),
                type = parseInt(btnReactionMsg.attr('data-type')),
                linkEmotion = render.baseUrlEmotion(type);

            liveChat.reactionMessage(messageID, type, linkEmotion, socketLiveChat.userID);
            const itemMessage = liveChat.getItemMessage(messageID),
                messageType = itemMessage.messageType,
                message = itemMessage.message,
                listUserId = (itemMessage.emotionMessage.find(item => item.type == type) != undefined) ? itemMessage.emotionMessage.find(item => item.type == type).listUserId : [],
                isChecked = liveChat.isCheckedReaction;

            socketLiveChat.reactionMessage(messageID, type, linkEmotion, isChecked, messageType, message);
            // Gọi API
            liveChat.callAjax(render.apiReactionMessage(), {
                MessageId: messageID,
                ListUserId: listUserId.join(),
                Type: type
            }, null, null, true);
        });

    $(window)
        .blur(function() {
            render.removeContext();
            liveChat.isTabActive = false;
        })
        .focus(function() {
            liveChat.isTabActive = true;
        });

    $('#drag')
        .on('mousedown', function(e) {
            isResizing = true;
            lastDownX = e.clientX;
        });
}