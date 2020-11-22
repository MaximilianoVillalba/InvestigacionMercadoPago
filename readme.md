#### _Trabajo de investigación_

# **Tema: MercadoPago**

---

##### Autores:

- Arian Alberto Acevedo
- Maximiliano Nahuel Villalba

## **Introducción:**

Debido a la situacion que nos compete a todos, se ha solicitado de gran manera lo que llamamos "e-commerce" o comercio electrónico. Gracias a esta alternativa dentro del mercado, se le facilita a los comercios la posibilidad de poder recibir pagos de manera online y a los clientes, poder comprar via online logrando una facilidad y practicidad en cuanto a la circulación de la moneda corriente.

---

## **Carrito**

Podemos explicar que tal implementacion se ha hecho por medio de JavaScript y utilizando
lo que llamamos como "LocalStorage", siendo una API de Almacenamiento en la WEB, la cual nos provee poder almanacer
datos que creamos reelevante del lado del cliente sin la necesidad de tener una base de datos para hacer persistir los datos.
Otra mencion importante es la comunicacion de CLIENTE-SERVIDOR por medio de llamadas AJAX, quien nos permite realizar peticiones al servidor
de manera asyncronica por medio de JavaScript.

#### Incluir API de Mercado Pago:

Primero que nada, es necesaria la instalacion del gestor de paquetes Composer, el cual se puede descargar de [https://getcomposer.org/](https://getcomposer.org/).
Una vez instalado, digirse al directorio raíz de nuestro proyecto, y en la consola colocar el siguiente comando:
`php composer.phar require "mercadopago/dx-php"`
Luego ya se podrá utilizar la API de mercadago por medio de un carrito.

También es necesario incluir el siguiente script para generar el token de pago y así enviar los datos de las tarjetas hacia el backend:
`<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>`

---

## **Botón de pago**

Generar un botón de pago es la opción más sencilla, aunque también más estática. Permite a cualquier vendedor sin conocimientos previos, poder indicar el nombre del artículo, precio e imagen de referencia. A partir de allí, se genera un enlace y opcionalmente el código HTML para integrar al sitio web.
Los pasos son bastante similares entre Mercado Pago y Todo Pago, e incluso ambos permiten redirigir a un sitio en particular cuando el pago esté aprobado o pendiente.
En cuanto al uso de ambos sitios, tiene pocos requisitos para comenzar a operar, presentando fotos del DNI y datos de la persona. No hay que pagar por empezar a usarlo, sino que cobran comisión por cada cobro, dependiendo del tiempo en que uno decida tener disponible el dinero.

#### Código de ejemplo:

- Mercado Pago incluye un sencillo botón en forma de script JS, el cual despliega un modal para ingresar los datos de pago.

```html
<script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="169545813-6d5565b1-22f0-409d-bace-b00576e3722d"
></script>
```

- Todo Pago incluye un botón en forma de HTML directo con enlace, el cual redirige a otro sitio web para ingresar los datos de pago.

```html
<div class="col boton-todopago-css">
  <!-- Botón remera Todo Pago -->
  <a
    href="https://forms.todopago.com.ar:443/formulario/commands?command=formulario&fr=1&m=94336996105b6b685b2d7424c5f8b51f&utm_medium=boton_de_pago#utm_source=3965965&utm_campaign=web"
  >
    <div
      id="aviso-5"
      class="tipo-boton-class col-md-4 col-sm-4 col-xs-12 aviso aviso2_oscuro aviso-small aviso-dark clearfix"
      style="display: block;"
    >
      <div class="aviso-wrapper clearfix" style="width: 500px; height: 350px;">
        <div class="clearfix">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="aviso-image-wrapper" style="display: block;">
              <div class="clearfix">
                <img
                  src="https://portal.todopago.com.ar:443/app/api/sim/getImage/94336996105b6b685b2d7424c5f8b51f"
                  class="aviso-imagen"
                  alt=""
                  title=""
                />
              </div>
            </div>
          </div>
          <div class="aviso-data col-md-6 col-sm-6 col-xs-12">
            <div class="clearfix">
              <span class="aviso-title line">Remera Negra</span>
              <span class="aviso-description line"
                >G&eacute;nero: Hombre - Talle: XL - Material principal: Jersey
                Peinado 24/1 - Color: Negro - Tipo de manga: Corta - Tipo de
                cuello: Redondo</span
              >
            </div>
          </div>
        </div>
        <div class="clearfix">
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input
              type="button"
              class="aviso-boton-texto btn disabled"
              value="Comprar"
              style="border: 1px solid rgb(23, 153, 139); color: rgb(255, 255, 255); background-color: rgb(2, 156, 207); font-family: Impact, Charcoal, sans-serif;"
            />
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <span class="aviso-price-label line">Precio del &Iacute;tem</span>
            <span class="aviso-price line">700,00</span>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
<!-- Fin Botón remera Todo Pago -->
```

---

## El resultado final:

- De esta forma se presenta un botón de pago generado mediante Mercado Pago:
  ![Botón Mercado Libre](https://i.imgur.com/TDmvz4B.jpg "Botón Mercado Libre")

- El cual despliega el siguiente modal en el propio sitio:
  ![Modal Mercado Libre](https://i.imgur.com/yiPD8xD.jpg "Modal Mercado Libre")

- De esta forma se presenta un botón de pago generado mediante Todo Pago:
  ![TodoPago boton 1](https://i.imgur.com/zktAuhS.jpg "TodoPago boton 1")
  ![TodoPago boton 2](https://i.imgur.com/Yjyvl75.jpg "TodoPago boton 2")

- El cual redirige hacia una web externa:
  ![Enlace Todo Pago](https://i.imgur.com/Ay4npPg.jpg "Enlace Todo Pago")

- En el caso del carrito virtual, al pulsar cada botón de agregar, se va almacenando temporalmente el carrito mediante localstorage (javascript):
  ![Agregar al carrito](https://i.imgur.com/7ICmWWI.jpg "Agregar al carrito")

- Al "Cargar carrito", redirige a una página con un resumen y el botón de pagar, el cual despliega el mismo modal mostrado anteriormente:
  ![Resumen carrito](https://i.imgur.com/KaW26aM.jpg "Resumen carrito")

---

## Referencias:

- Crear link de pago en MercadoPago: [https://www.mercadopago.com.ar/receive-payments/tools](https://www.mercadopago.com.ar/receive-payments/tools)
- Crear link de pago o código QR en Todo Pago: [https://portal.todopago.com.ar/app/#crearBoton](https://portal.todopago.com.ar/app/#crearBoton)
- Integrar procesador de pago de Mercado Libre: [https://www.mercadopago.com.ar/developers/es/guides/online-payments/checkout-api/introduction](https://www.mercadopago.com.ar/developers/es/guides/online-payments/checkout-api/introduction)

**_Programación Web Dinámica 2020 - Universidad Nacional del Comahue_**
