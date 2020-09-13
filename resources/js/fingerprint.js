createHidden = (name, value) => {
    let hidden = document.createElement('input');
    Object.assign(hidden, {
        type: 'hidden',
        name: name,
        value: value
    });
    return hidden;
};

let fp = require('fingerprintjs2/fingerprint2');

fp.get((components) => {
    const values = components.map((component) => component.value);
    const fingerprint = fp.x64hash128(values.join(''), 31);
    document.body.addEventListener('submit', (event) => {
        const hidden = createHidden('fingerprint', fingerprint);
        event.target.appendChild(hidden);
    });
});
