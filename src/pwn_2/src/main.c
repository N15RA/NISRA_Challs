#include <stdio.h>
#include <unistd.h>

void win()
{
	puts("NISRA{0hh_y0u_c4n_r3t2c0de}");
}

void vuln()
{
	char buf[20];
	printf("Have you heard about ret2code:");
	gets(buf);
}

void unbuffer()
{
	setvbuf(stdin, NULL, _IONBF, 0);
	setvbuf(stdout, NULL, _IONBF, 0);
}

int main()
{
	unbuffer();
	vuln();
	return 0;
}