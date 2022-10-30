
resource "aws_default_vpc" "default" {} # This need to be added since AWS Provider v4.29+ to get VPC id

data "aws_ami" "ubuntu" {
  most_recent = true

  filter {
    name   = "name"
    values = ["ubuntu/images/hvm-ssd/ubuntu-focal-20.04-amd64-server-*"]
  }

  filter {
    name   = "virtualization-type"
    values = ["hvm"]
  }

  owners = ["099720109477"] # Canonical
}

data "aws_route53_zone" "selected" {
  name         = "ismailqouiqa.com"
}

resource "aws_route53_record" "www" {
  zone_id = data.aws_route53_zone.selected.zone_id
  name    = "www.${data.aws_route53_zone.selected.name}"
  type    = "CNAME"
  ttl     = 300
  records = [aws_eip.web.public_dns]
}

resource "aws_eip" "web" {
  vpc      = true  # Need to be added in new versions of AWS Provider
  instance = aws_instance.web.id
  tags = {
    Name  = "EIP for Miscite Built by Terraform"
    Owner = "Ismail QOUIQA"
  }
}

resource "aws_instance" "web" {
  ami           = data.aws_ami.ubuntu.id
  instance_type = "t3.micro"
  key_name = "miscite-server"

  tags = {
    Name = "Miscsite"
  }
}


resource "aws_security_group" "web" {
  name        = "Miscite"
  description = "Security Group for Miscite"
  vpc_id      = aws_default_vpc.default.id # This need to be added since AWS Provider v4.29+ to set VPC id

  dynamic "ingress" {
    for_each = ["80", "443", "22"]
    content {
      description = "Allow port ${ingress.value}"
      from_port   = ingress.value
      to_port     = ingress.value
      protocol    = "tcp"
      cidr_blocks = ["0.0.0.0/0"]
    }
  }

  egress {
    description = "Allow ALL ports"
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  tags = {
    Name  = "MISCITE SG by Terraform"
    Owner = "Ismail QOUIQA"
  }
}