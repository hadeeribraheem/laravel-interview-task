let questionIndex = 1;

document.getElementById('add-question').addEventListener('click', function () {
    let questionsSection = document.getElementById('questions-section');

    const newQuestion = `
                <div class="form-group">
                    <label for="question_${questionIndex}">Question ${questionIndex + 1}</label>
                    <input type="text" name="questions[${questionIndex}][question]" id="question_${questionIndex}" class="form-control" required>

                    <label for="type_${questionIndex}">Question Type</label>
                    <select name="questions[${questionIndex}][type]" id="type_${questionIndex}" class="form-control" onchange="showOptions(this, ${questionIndex})" required>
                        <option value="text">Text</option>
                        <option value="select">Select</option>
                        <option value="data">Data</option>
                    </select>

                    <div id="select-options-${questionIndex}" class="mt-2" style="display: none;">
                        <h5>Options</h5>
                        <div class="form-group">
                            <input type="text" name="questions[${questionIndex}][options][]" class="form-control mb-2" placeholder="Option 1">
                            <input type="text" name="questions[${questionIndex}][options][]" class="form-control mb-2" placeholder="Option 2">
                            <button type="button" class="btn btn-secondary" onclick="addOption(${questionIndex})">Add Another Option</button>
                        </div>
                    </div>

                    <label for="is_required_${questionIndex}">Is Required?</label>
                    <select name="questions[${questionIndex}][is_required]" id="is_required_${questionIndex}" class="form-control" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            `;

    questionsSection.insertAdjacentHTML('beforeend', newQuestion);
    questionIndex++;
});

function showOptions(selectElement, index) {

    const selectOptions = document.getElementById(`select-options-${index}`);
    if (selectElement.value === 'select') {
        console.log('test show options function');
        selectOptions.style.display = 'block';
    } else {
        selectOptions.style.display = 'none';
    }
}

function addOption(index) {
    let selectOptions = document.querySelector(`#select-options-${index} .form-group`);
    let newOptionInput = `<input type="text" name="questions[${index}][options][]" class="form-control mb-2" placeholder="New Option">`;
    selectOptions.insertAdjacentHTML('beforeend', newOptionInput);
}
