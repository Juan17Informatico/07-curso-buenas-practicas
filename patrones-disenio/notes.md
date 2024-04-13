

## Singleton 

El patrón de diseño Singleton es un patrón de software que restringe la creación de una clase a un solo objeto. Es decir, si se intenta crear una nueva instancia de una clase que aplica el patrón Singleton, se obtendrá un objeto que ya existe en lugar de un nuevo objeto.

El propósito de este patrón es controlar el acceso a recursos compartidos, como puede ser la conexión a una base de datos o la configuración global de una aplicación. Al asegurar que solo exista una instancia, se evita la redundancia y se garantiza que todos los componentes del sistema se coordinen a través de la misma instancia.

La implementación del patrón Singleton típicamente involucra:

1. **Constructor privado**: Se hace privado el constructor de la clase para prevenir la creación de instancias desde fuera de la clase.
2. **Variable estática privada**: Esta variable almacena la única instancia de la clase.
3. **Método público estático**: Este método permite a los clientes acceder a la instancia única. Si la instancia no existe, el método crea una utilizando el constructor privado; si ya existe, simplemente devuelve la referencia a esa instancia.

El patrón Singleton es útil cuando una única instancia de una clase debe ser usada por varios otros objetos, y cuando es crucial que esa instancia sea accesible globalmente en una aplicación. Sin embargo, su uso debe ser cuidadosamente considerado debido a que puede introducir restricciones en el diseño del software y dificultar las pruebas debido a su naturaleza global y estado compartido.

## Factory

El patrón de diseño Factory, también conocido como Factory Method, es un patrón creacional que se utiliza para delegar la lógica de creación de objetos a clases específicas, permitiendo de esta forma flexibilizar y centralizar la creación de objetos en una aplicación. El objetivo principal de este patrón es separar la construcción de objetos de su representación, haciendo que el código sea más modular y fácil de mantener.

El patrón Factory se implementa típicamente de la siguiente manera:

1. **Interfaz de producto**: Define la interfaz de los objetos que el método fábrica creará.
2. **Implementaciones concretas del producto**: Estas son clases que implementan la interfaz de producto y definen objetos específicos que serán creados por la fábrica.
3. **Creador (o Factory)**: Esta es una clase que declara el método fábrica, el cual retorna objetos de tipo producto. Este método puede ser diseñado como abstracto, obligando a las subclases a definir cómo se crean los objetos, o puede retornar un tipo de producto predeterminado.
4. **Creadores concretos**: Son subclases del creador que implementan el método fábrica para crear y retornar productos específicos.

El uso del patrón Factory tiene varias ventajas:

- **Flexibilidad**: Los clientes trabajan con interfaces para instancias de objetos, lo que permite cambiar las clases concretas de productos sin cambiar el código que usa los productos.
- **Desacoplamiento**: Los clientes no necesitan saber cómo se crean y ensamblan los objetos; solo necesitan saber cómo interactuar con ellos a través de sus interfaces.
- **Consolidación del código de creación**: Toda la lógica relacionada con la creación de los objetos se mantiene en un lugar, lo que facilita las actualizaciones y el mantenimiento.

El patrón Factory es especialmente útil cuando hay un conjunto complejo de criterios para crear diferentes objetos, lo que puede incluir la elección de la clase de objeto a crear en tiempo de ejecución en base a ciertos parámetros. También es útil cuando el proceso de creación debe estar aislado del código principal para facilitar la futura expansión o mantenimiento sin modificar el código que utiliza los objetos.

## Command
El patrón de diseño Command encapsula una solicitud como un objeto, permitiendo de esta forma parametrizar clientes con diferentes solicitudes, colas o solicitudes de registro, y operaciones que pueden ser deshechas. Es especialmente útil para organizar y gestionar acciones que requieren funcionalidades como deshacer/rehacer, mantenimiento de un historial de acciones, y operaciones que deben ser aplazadas o ejecutadas de acuerdo a ciertos eventos o condiciones.

El patrón Command se implementa generalmente a través de los siguientes componentes:

1. **Command**: Esta es una interfaz que declara un método para ejecutar una operación.
2. **ConcreteCommand**: Clases que implementan la interfaz Command, definiendo un enlace entre un objeto Receiver y una acción. Estos objetos encapsulan todos los detalles de la operación, incluyendo los argumentos y el receptor.
3. **Receiver**: El objeto que sabe cómo realizar las operaciones necesarias. La clase ConcreteCommand delega la ejecución de las operaciones en el objeto Receiver.
4. **Invoker**: Es quien llama al command para ejecutar la solicitud. Puede ser configurado con uno o múltiples comandos. Puede ser tan simple como un botón en una interfaz gráfica de usuario o puede ser una cola compleja de comandos que se ejecutan en respuesta a ciertos eventos.
5. **Client**: El cliente crea y configura los objetos ConcreteCommand. El cliente asigna los comandos al invocador, quien ejecuta los comandos.

### Ejemplo de uso del patrón Command:

Supongamos que tenemos una aplicación de procesamiento de texto y queremos implementar operaciones de copiado, cortado y pegado, las cuales deben tener la capacidad de deshacerse. Podríamos tener una interfaz `Command` con un método `execute()` y clases `CopyCommand`, `CutCommand` y `PasteCommand` que implementan esta interfaz. Cada una de estas clases estaría vinculada a un objeto `Document` (el Receiver), que es el responsable de realizar las acciones específicas de copiar, cortar y pegar. Un objeto `MenuOption` o similar actuaría como Invoker, llamando a `execute()` en el comando adecuado cuando el usuario selecciona una opción del menú.

### Ventajas del patrón Command:

- **Separación de responsabilidades**: Desacopla la clase que invoca la operación de la clase que sabe cómo realizarla.
- **Extensibilidad**: Se pueden añadir nuevos comandos sin cambiar el código existente, lo que facilita la extensión y el mantenimiento del sistema.
- **Composición**: Los comandos pueden componerse en macros, es decir, comandos complejos que consisten en varios subcomandos.

Este patrón es ampliamente utilizado en el diseño de interfaces gráficas, donde las acciones del usuario necesitan ser transformadas en operaciones sobre los datos o modelos de la aplicación. También es crucial en el diseño de sistemas que necesitan mantener un historial de acciones para características como deshacer/rehacer.