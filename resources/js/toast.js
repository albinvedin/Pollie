toast = (text) => {
    if (document.getElementsByClassName('toast').length > 0) return;
    let div = document.createElement('div');
    div.innerHTML = text;
    div.className = 'toast show';
    document.body.appendChild(div);

    setTimeout(() => {
        document.body.removeChild(div);
    }, 3000);
};
