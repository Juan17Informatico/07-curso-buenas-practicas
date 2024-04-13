<?php

class Calculator {
    // Propiedad estática privada que almacena la única instancia de la clase
    private static $instance = null;

    // Constructor privado para prevenir la creación de instancias directas
    private function __construct() {
    }

    // Método estático público para acceder a la instancia
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Calculator();
        }
        return self::$instance;
    }

    // Método para sumar dos números
    public function add($a, $b) {
        return $a + $b;
    }

    // Método para restar dos números
    public function subtract($a, $b) {
        return $a - $b;
    }

    // Método para multiplicar dos números
    public function multiply($a, $b) {
        return $a * $b;
    }

    // Método para dividir dos números
    public function divide($a, $b) {
        if ($b == 0) {
            throw new Exception("Division by zero.");
        }
        return $a / $b;
    }
}

// Usando la calculadora

try {
    // Obtiene la única instancia de Calculator
    $calc = Calculator::getInstance();

    // Realiza operaciones
    $sum = $calc->add(10, 5);
    $sub = $calc->subtract(10, 5);
    $mul = $calc->multiply(10, 5);
    $div = $calc->divide(10, 5);

    echo "Sum: $sum\n";
    echo "Subtract: $sub\n";
    echo "Multiply: $mul\n";
    echo "Divide: $div\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
