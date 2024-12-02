<?php
// session_start();
// require_once '../connection/connection.php';

// // Verifica se o usuário está logado
// if (!isset($_SESSION['loggedin'])) {
//     die(json_encode(['error' => 'Usuário não encontrado.']));
// }

// extract($_POST);

// try{
//     $errorMsg = "";
//     $successMsg = "";

//     $sql = "SELECT * FROM cliente WHERE email = :email";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':email', $email);
//     $stmt->execute();

//     if ($stmt->rowCount() === 1) {
//         $usuario = $stmt->fetch(PDO::FETCH_OBJ);

//                 if (password_verify($oldpassword, $usuario->Senha)) {
//                     // Preciso que 
//                 } else {
//                     $errorMsg = "Usuário ou senha incorretos.";
//                 }
//             }

//     if() {
//         throw new Exception("As senhas não são iguais");
//     }else{
//         $sql = "UPDATE cliente SET Senha=:senha WHERE ID_cliente=:ID_cliente";
//         $stmt = $conn->prepare($sql);
//         $stmt->bindValue(':ID_cliente', $_SESSION['idusuario']);
//         $stmt->bindValue(':senha', htmlspecialchars($senha));
//         $stmt->execute();

//         $successMsg = "Perfil Atualizado";
//     };
//     if ($successMsg) {
//         echo json_encode(['success' => $successMsg]);
//     }

// } catch (PDOException $e) {
//     echo json_encode(['error' => "Erro ao atualizar o perfil: " . $e->getMessage()]);
// } catch (Exception $e) {
//     echo json_encode(['error' => $e->getMessage()]);
// } finally {
//     $conn = null;
// }
?>