<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/media-query.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>
<body>

    <?php

  include("menu.php");

  ?>

<div class="container-pag-cad">


    
    <div class="payment-methods">
        <label>
            <span>
                <input type="radio" name="paymentMethod" value="card" checked>
                Cartão
            </span>
        </label>
        <label>
            <span>
                <input type="radio" name="paymentMethod" value="pix">
                Pix
            </span>
        </label>
        <label>
            <span>
                <input type="radio" name="paymentMethod" value="boleto">
                Boleto
            </span>
        </label>
    </div>


    <div class="flexbox">
    <div class="pix-container">
        
        <div class="qrcode-container">
            <img src="imagens/qrcode.png" alt="QR Code PIX" class="pix-qrcode">
            <br>

            <div class="pix-copy-btn">

                
                <button data-pix-key="Chave do pixxx"><span class="material-symbols-outlined">
                    content_copy </span>Pix copia e cola</button>
           
        </div>        
            
        </div>
       
       
        <button class="pix-finalizar">Finalizar Compra</button>

    </div>
    </div>
    
    <!-- Formulário Boleto -->
    <div class="flexbox">
    <div class="boleto-container">
        <img src="imagens/boleto.png" alt="">
        <br>
        <br>
        <br>
        <p>Seu boleto será gerado e enviado por email após a finalização da compra.</p>
        <br>
        <p>Todas as informações da sua compra será enviada para o seu email cadastrato</p>
        <br>
        <button class="pix-finalizar">Finalizar Compra</button>

        
    </div>
</div>

    <div class="card-container">

        <div class="front">
            <div class="image">
                <img src="imagens/chip.png" alt="">
                <img src="imagens/visa.png" alt="">
            </div>
            
            <div class="card-number-box"></div>
            <div class="flexbox">
                <div class="box">
                    <span>Número do Cartão</span>
                    <div class="card-holder-name">Nome do Cartão</div>
                </div>
                <div class="box">
                    <span>expira</span>
                    <div class="expiration">
                        <span class="exp-month">mm</span>
                        <span class="exp-year">aa</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="imagens/visa.png" alt="">
            </div>
        </div>

    </div>

    <form  action="cad-prod.php" method="post" enctype="multipart/form-data">
        <div class="total-pag-finalizar">
            
            <p>TOTAL : R$00,00</p>
        </div>
        <div class="inputBox">
            <span>Número do Cartão</span>
            <input type="text" maxlength="16" class="card-number-input" placeholder="Número do Cartão">
        </div>
        <div class="inputBox">
            <span>Nome do Titular</span>
            <input type="text" class="card-holder-input" placeholder="Nome do Titular">
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>Validade mm</span>
                <select name="" id="" class="month-input">
                    <option value="month" selected disabled>Mês</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Ano</span>
                <select name="" id="" class="year-input">
                    <option value="year" selected disabled>Ano</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                </select>
            </div>
            
               
            <div class="inputBox">
                <span>cvv</span>
                <input type="text" maxlength="4" class="cvv-input" placeholder="cvv">
            </div>
        </div>

        
        <div class="inputBox">
            <div class="Parcelas">
    <label for="">Parcelas</label>
    <select name="subcategoria" id="">
        <option value="1x">1x de R$100,00 (a vista)</option>
        
        <p>
        <option value="2x">2x de R$50,00</option>
        </p>
        <p>
        <option value="3x">2x de R$50,00</option>
        </p>
        <p>
        <option value="4x">2x de R$50,00</option>
        </p>
        <p>
        <option value="5x">2x de R$50,00</option>
        </p>
        <p>
        <option value="6x">2x de R$50,00</option>
        </p>
        <p>
        <option value="7x">2x de R$50,00</option>
        </p>
        <p>
        <option value="8x">2x de R$50,00</option>
        </p>
        <p>
        <option value="9x">2x de R$50,00</option>
        </p>
        <p>
        <option value="10x">2x de R$50,00</option>
        </p>
        <p>
        <option value="11x">2x de R$50,00</option>
        </p>
        <p>
        <option value="12x">2x de R$50,00</option>
        </p>
     
    </select>
</div>
    </div>
        <input type="submit" value="submit" class="submit-btn">
    </form>

</div>    
    





<script>

document.querySelector('.card-number-input').oninput = () =>{
    document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
}

document.querySelector('.card-holder-input').oninput = () =>{
    document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
}

document.querySelector('.month-input').oninput = () =>{
    document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
}

document.querySelector('.year-input').oninput = () =>{
    document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
}

document.querySelector('.cvv-input').addEventListener('focus', () => {
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
});

document.querySelector('.cvv-input').addEventListener('blur', () => {
    document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
    document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
});


document.querySelector('.cvv-input').oninput = () =>{
    document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
}

document.querySelectorAll('input[name="paymentMethod"]').forEach(input => {
    input.addEventListener('change', function() {
        document.querySelector('.container-pag-cad form').style.display = this.value === 'card' ? 'block' : 'none';
        document.querySelector('.card-container').style.display = this.value === 'card' ? 'block' : 'none';
        document.querySelector('.pix-container').style.display = this.value === 'pix' ? 'block' : 'none';
        document.querySelector('.boleto-container').style.display = this.value === 'boleto' ? 'block' : 'none';
    });
});

document.querySelector('.pix-copy-btn').addEventListener('click', function() {
    const pixKey = this.getAttribute('data-pix-key');
    const textarea = document.createElement('textarea');
    textarea.value = pixKey;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    alert('Chave PIX copiada com sucesso!');
});


</script>





<?php

  include("includes/footer.php")

  ?>

</body>
</html>