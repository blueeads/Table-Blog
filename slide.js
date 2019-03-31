// 0번부터 시작되는 슬라이드 위치 저장
var timer;
var min_position = 0;
var max_position = 2;
var slide_position = 0;

// slide-box 라는 아이디를 가진 태그의 스타일 left 값을 내가 원하는 값으로 변경.
function changeSlideStyle(left_px, pos) {
    // pos = -1000px
    var slide_box = document.getElementById('slide-box');
    slide_box.style.left = left_px;

    var slide_btns = document.getElementById('slide-pos-box').getElementsByClassName('slide-box-btn');
    // 0: slide-box-btn 1번
    // 1: slide-box-btn 2번
    // 2: slide-box-btn 3번

    // 0 < 3, 1 < 3, 2 < 3
    for(var i = 0; i < slide_btns.length; i++) {
        slide_btns[i].classList.remove('active'); // 모든 슬라이드 버튼은 active가 사라지고,
    }

    var current_slide_btn = slide_btns[pos];
    
    // 현재 슬라이드 버튼에 active 클래스를 추가한다.
    current_slide_btn.classList.add('active');
}

// 내가 바뀌기를 원하는 슬라이드 위치를 넘기면, left 값을 계산해서 changeSlideStyle 함수를 실행
// 외부 슬라이드 저장변수에 넣어줌.
function changeSlidePos(pos) {
    if (pos > max_position) { // 슬라이드 번호는 0번부터 시작. 만약 다음 슬라이드가 번호가 3번이면,
        pos = min_position;
    } else if (pos < min_position) {
        pos = max_position;
    }

    var left_px = pos * -1000; // -2000px

    changeSlideStyle(left_px + 'px', pos); // 0px, -1000px

    slide_position = pos;

    createTimer();
}

function nextSlide() {
    changeSlidePos(slide_position + 1); // 다음 슬라이드 번호
}

function backSlide() {
    changeSlidePos(slide_position - 1); // 이전 슬라이드 번호
}

function createTimer() {
    if (timer) {
        clearInterval(timer);
        timer = null;
    }

    timer = setInterval(function() {
        nextSlide();
    }, 3000);
}
