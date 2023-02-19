function validate_form() {
    const $inputs = document.querySelectorAll('.validate-input');
    const $forms = document.querySelectorAll('.validate-form');

    if (!$forms) {
        return;
    }

    for (const $form of $forms) {
        
        for(const $input of $inputs) {
            
            $input.addEventListener('input', function (event) {
                const $target = $input.querySelector('.validate-target');
                const $feedback = $input.querySelector('.invalid-feedback');
                
                console.log('changed'+ event.currentTarget + ':' + $target.validity)
                activateSubmitBtn($form);
    
                if (!$feedback.classList.contains('invalid-feedback')) {
                    return;
                }
    
                if($target.checkValidity()) {
        
                    $target.classList.add('is-valid');
                    $target.classList.remove('is-invalid');
        
                    $feedback.textContent = '';
                    
                } else {
        
                    $target.classList.add('is-invalid');
                    $target.classList.remove('is-valid');
        
                    if($target.validity.valueMissing) {
                        $feedback.textContent = '値の入力が必須です。';
                    } else if ($target.validity.tooLong) {
                        $feedback.textContent = $target.maxLength + '文字以下で入力してください。現在の文字数は' + $target.value.length +'文字です。';
                    } 
                }
                
            });
    
        }
    
        activateSubmitBtn($form);
        
    }
    
    function activateSubmitBtn($form) {
    
        const $submitBtn = $form.querySelector('[type="submit"]');
    
        if($form.checkValidity()) {
    
            $submitBtn.removeAttribute('disabled');
            $submitBtn.classList.remove('button-disabled');
            
        } else {
            
            $submitBtn.setAttribute('disabled', true);
            $submitBtn.classList.add('button-disabled');
    
        }
    }
}