#include <iostream>
#include <cstdio>
#include <cstdlib>
#include <stdexcept>
#include <unistd.h>
#include <map>
#include <unordered_map>

using namespace std;

const char *title = " __     __           __  __        __             __                         \n"
                    "|  \\   |  \\         |  \\|  \\      |  \\           |  \\                        \n"
                    "| $$   | $$ ______  | $$ \\$$  ____| $$  ______  _| $$_     ______    ______  \n"
                    "| $$   | $$|      \\ | $$|  \\ /      $$ |      \\|   $$ \\   /      \\  /      \\ \n"
                    " \\$$\\ /  $$ \\$$$$$$\\| $$| $$|  $$$$$$$  \\$$$$$$\\\\$$$$$$  |  $$$$$$\\|  $$$$$$\\\n"
                    "  \\$$\\  $$ /      $$| $$| $$| $$  | $$ /      $$ | $$ __ | $$    $$| $$   \\$$\n"
                    "   \\$$ $$ |  $$$$$$$| $$| $$| $$__| $$|  $$$$$$$ | $$|  \\| $$$$$$$$| $$      \n"
                    "    \\$$$   \\$$    $$| $$| $$ \\$$    $$ \\$$    $$  \\$$  $$ \\$$     \\| $$      \n"
                    "     \\$     \\$$$$$$$ \\$$ \\$$  \\$$$$$$$  \\$$$$$$$   \\$$$$   \\$$$$$$$ \\$$      ";

const int limit = 5;
// hash map for checking repeat keys
unordered_map<string, bool> m;

void disableBuffer()
{
    setvbuf(stdin, NULL, _IONBF, 0);
    setvbuf(stdout, NULL, _IONBF, 0);
}

void setTimeout()
{
	alarm(limit);
}

void welcome()
{
    printf("%s\n", title);
	for(int i = 0; i < 83; i++) putchar('=');
    putchar('\n');
    printf("If you give me VALID 50 keys, I will give what you want~ (%s)\n", "Credit to Yuri From crackmes.one");
    printf("You have ONLY %d seconds\n", limit);
}

// ref: https://stackoverflow.com/questions/478898/how-do-i-execute-a-command-and-get-output-of-command-within-c-using-posix
std::string exec(const char* cmd) {
    char buffer[128];
    std::string result;
    FILE* pipe = popen(cmd, "r");
    if (!pipe) throw std::runtime_error("popen() failed!");
    try {
        while (fgets(buffer, sizeof buffer, pipe) != NULL) {
            result += buffer;
        }
    } catch (...) {
        pclose(pipe);
        throw;
    }
    pclose(pipe);
    return result;
}

bool verifyKey(string s)
{
    if(m.count(s))
        return false;
    string res;
	try
	{
		res = exec(("./SimpleKeyGen \"" + s + "\"").c_str());
	}
	catch(runtime_error& e)
	{
		cerr << "Runtime_error: " << e.what() << '\n';
        exit(1);
	}

    size_t i = res.find("Good Serial");
    if(i != string::npos)
        return true;
    else
        return false;
}

void flag()
{
    printf("NISRA{f1RS7_K3Y93N_1S_34Sy}");
}

bool running = true;

int main(int argc, char* argv[])
{
    disableBuffer();
    setTimeout();
    welcome();

    int key = 0;
    char in[1024];
    while(running)
    {
        printf("[Keys %03d] >>", key);
        scanf("%1000s", in);

        if(verifyKey(in))
        {
            string tmp(in);
            m.emplace(tmp, true);
            key++;
        }
        else
            running = false;

        if(key == 50)
        {
            flag();
            running = false;
        }
    }
	return 0;
}