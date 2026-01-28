# PHP 8.5 Preloading SIGSEGV Reproducer

This folder contains a minimal reproduction for a Segmentation Fault in PHP 8.5 (Alpine) when using typed class constants with Closures.

**The crash occurs when accessing the constant after the class has been preloaded.**

## Files
- `BuggyClass.php`: Contains the class with the typed closure constant.
- `preload.php`: The preloading script.
- `index.php`: The script that triggers the crash by accessing the preloaded constant.
- `debian.Dockerfile`: A standalone Debian based Docker environment to trigger the crash.
- `alpine.Dockerfile`: A standalone Alpine based Docker environment to trigger the crash.

## How to run
1. Navigate to this directory.
2. Build the image:
   ```bash
   docker build -t php-bug-reproducer -f debian.Dockerfile .
   ```
3. Run the container:
   ```bash
   docker run --rm --cap-add=SYS_PTRACE php-bug-reproducer
   ```

## Expected Result
```
Accessing constant...
Success: This will crash during preloading
```

## Actual Result
The process crashes with `SIGSEGV` immediately after printing "Accessing constant...".
