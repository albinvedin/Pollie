window.copyToClipboard = (text) => {
    let textArea = document.createElement('textarea');

    textArea.value = text;

    document.body.appendChild(textArea);

    textArea.select();

    try {
        document.execCommand('copy');
    } catch (error) {}

    document.body.removeChild(textArea);
};

window.onload = () => {
    let copyables = document.querySelectorAll('.copyable');

    for (let copyable of copyables) {
        copyable.onclick = () => {
            copyToClipboard(copyable.innerHTML);
            toast('Copied!');
        }
    }
};
