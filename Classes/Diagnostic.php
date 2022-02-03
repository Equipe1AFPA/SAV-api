<!-- GERMAIN FLORIAN : réalisation de la classe diagnostic (25/01)-->

<?php 
    class Diagnostic {
        private $id;
        private $imageDiagnostic;
        private $detailDossier;
        private $listDiagnostic;
        private $commentaire;  
        private $denomination;
        private $type;
        private $supplier;
        private $orderNumber;
        private $creationDate;
        private $folderNumber;

        // Création des getters et setters
        public function getImageDiagnostic()
        {
            return $this->imageDiagnostic;
        }

        public function setImageDiagnostic($imageDiagnostic)
        {
            $this->imageDiagnostic = $imageDiagnostic;

            return $this;
        }


        public function getDetailDossier()
        {
            return $this->detailDossier;
        }

        public function setDetailDossier($detailDossier)
        {
            $this->detailDossier = $detailDossier;

            return $this;
        }

        public function getListDiagnostic()
        {
            return $this->listDiagnostic;
        }

        public function setListDiagnostic($listDiagnostic)
        {
            $this->listDiagnostic = $listDiagnostic;

            return $this;
        }


        public function getCommentaire()
        {
            return $this->commentaire;
        }


        public function setCommentaire($commentaire)
        {
            $this->commentaire = $commentaire;

            return $this;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        public function getDenomination()
        {
            return $this->denomination;
        }

        public function setDenomination($denomination)
        {
            $this->denomination = $denomination;

            return $this;
        }


        public function getType()
        {
            return $this->type;
        }


        public function setType($type)
        {
            $this->type = $type;

            return $this;
        }


        public function getSupplier()
        {
            return $this->supplier;
        }
    
        public function setSupplier($supplier)
        {
            $this->supplier = $supplier;

            return $this;
        }


        public function getOrderNumber()
        {
            return $this->orderNumber;
        }

        public function setOrderNumber($orderNumber)
        {
            $this->orderNumber = $orderNumber;

            return $this;
        }


        public function getCreationDate()
        {
            return $this->creationDate;
        }

        public function setCreationDate($creationDate)
        {
            $this->creationDate = $creationDate;

            return $this;
        }

        public function getFolderNumber()
        {
            return $this->folderNumber;
        }

        public function setFolderNumber($folderNumber)
        {
            $this->folderNumber = $folderNumber;

            return $this;
        }
    }
?>
