'use strict';
(() => {
    const modified_inputs = new Set();
    const defaultValue = 'defaultValue';
    // store default values
    addEventListener('beforeinput', evt => {
        const target = evt.target;
        if (!(defaultValue in target.dataset)) {
            target.dataset[defaultValue] = ('' + (target.value || target.textContent)).trim();
        }
    });

    // detect input modifications
    addEventListener('input', evt => {
        const target = evt.target;
        let original = target.dataset[defaultValue];

        let current = ('' + (target.value || target.textContent)).trim();

        if (original !== current) {
            if (!modified_inputs.has(target)) {
                modified_inputs.add(target);
            }
        } else if (modified_inputs.has(target)) {
            modified_inputs.delete(target);
        }
    });
    ['saved', 'submit'].forEach(function (e) {
        addEventListener(e, function (e) {
            modified_inputs.clear()
        });
    });
    /* addEventListener(
        'saved',
        function (e) {
            modified_inputs.clear()
        },
        false
    ); */

    addEventListener('beforeunload', evt => {
        if (modified_inputs.size) {
            const unsaved_changes_warning = 'Changes you made may not be saved.';
            evt.returnValue = unsaved_changes_warning;
            return unsaved_changes_warning;
        }
    });

})();