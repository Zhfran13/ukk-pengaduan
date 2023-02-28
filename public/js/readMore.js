document.querySelectorAll('.readMore').forEach(element => {
    const paragraf = element.previousElementSibling.innerHTML;
    let toggle = true
    const moreDot = ' ...'

    element.previousElementSibling.innerHTML = paragraf.substring(0, 150) + moreDot;

    if (paragraf.length < 150) {
        element.classList.add('d-none')
        element.previousElementSibling.innerHTML = paragraf.substring(0, 150);
    }

    element.onclick = () => {
        if (toggle) {
            element.previousElementSibling.innerHTML = paragraf;
            element.previousElementSibling.classList.add('transition');
            element.innerHTML = 'Tutup'
        } else {
            element.innerHTML = 'Baca lebih lanjut'
            element.previousElementSibling.innerHTML = paragraf.substring(0, 150) + moreDot;
        }
        toggle = !toggle;
    }
})
