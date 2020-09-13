$(document).ready(function () {
    const options = getOptions();
    if (options.length > 0) {
        addFocusListener(options);
    }
});

getOptions = () => {
    return $('input[name="options[]"]');
};

getContainer = () => {
    return $('#options');
};

addFocusListener = (options) => {
    let last = $(options[options.length - 1]);
    last.focus(function () {
        addOption(options);
    });
};

addOption = (options) => {
    let last = $(options[options.length - 1]);
    last.off('focus');

    let label = $('<label></label>').text(`Option #${options.length + 1}`);
    let input = $('<input name="options[]" class="form-control" placeholder="Option...">');
    let div   = $('<div class="form-group"></div>');

    div.append(label);
    div.append(input);

    options.push(input);

    let container = getContainer();
    container.append(div);

    input.focus(function () {
        addOption(options);
    });
};
